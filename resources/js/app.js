import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

const setFormStatus = (form, state, message) => {
    const status = form.querySelector('[data-form-status]');

    if (!status) {
        return;
    }

    status.dataset.state = state;
    status.textContent = message;
};

const resetFieldErrors = (form) => {
    form.querySelectorAll('[data-field-error]').forEach((node) => {
        node.textContent = '';
        node.classList.add('hidden');
    });
};

const applyFieldErrors = (form, errors = {}) => {
    Object.entries(errors).forEach(([field, messages]) => {
        const errorNode = form.querySelector(`[data-field-error="${field}"]`);

        if (!errorNode) {
            return;
        }

        errorNode.textContent = Array.isArray(messages) ? messages[0] : String(messages);
        errorNode.classList.remove('hidden');
    });
};

const bindAsyncForms = () => {
    document.querySelectorAll('form[data-async-form]').forEach((form) => {
        if (form.dataset.asyncBound === 'true') {
            return;
        }

        form.dataset.asyncBound = 'true';

        form.addEventListener('submit', async (event) => {
            if (!form.reportValidity()) {
                return;
            }

            event.preventDefault();
            resetFieldErrors(form);
            setFormStatus(form, '', '');

            const submitButton = form.querySelector('[type="submit"]');
            const idleLabel = submitButton?.dataset.idleLabel ?? submitButton?.textContent ?? '';
            const busyLabel = submitButton?.dataset.loadingLabel ?? 'Mengirim...';

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = busyLabel;
            }

            try {
                const response = await fetch(form.action, {
                    method: form.method || 'POST',
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {}),
                    },
                    body: new FormData(form),
                });

                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    applyFieldErrors(form, data.errors ?? {});
                    setFormStatus(form, 'error', data.message ?? 'Terjadi kesalahan. Silakan periksa input Anda.');
                    return;
                }

                form.reset();
                setFormStatus(form, 'success', data.message ?? 'Form berhasil dikirim.');
            } catch (error) {
                setFormStatus(form, 'error', 'Koneksi gagal. Silakan coba lagi dalam beberapa saat.');
            } finally {
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = idleLabel;
                }
            }
        });
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bindAsyncForms);
} else {
    bindAsyncForms();
}
