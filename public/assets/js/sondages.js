document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#sondage-form');
    if (!form) return;
    const days = form.querySelector('#calendar-days');
    const recap = form.querySelector('.selected-dates');
    const status = form.querySelector('#dates-status');
    const dates = new Set();
    const today = new Date();
    const month = new Date(today.getFullYear(), today.getMonth(), 1);
    const full = new Intl.DateTimeFormat('fr-FR', {dateStyle: 'full'});
    const heading = new Intl.DateTimeFormat('fr-FR', {month: 'long', year: 'numeric'});
    const key = d => `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
    const renderRecap = () => {
        recap.replaceChildren();
        if (!dates.size) {
            recap.textContent = 'Aucune date sélectionnée.';
            return;
        }

        const list = document.createElement('div');
        list.className = "selected-dates-grid";
        [...dates].sort().forEach(value => {
            const [y, m, d] = value.split('-').map(Number);
            const item = document.createElement('div');
            item.textContent = full.format(new Date(y, m - 1, d));
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'dates[]';
            input.value = value;
            item.append(input);
            list.append(item);
        });
        recap.append(list);
    };
    const render = () => {
        form.querySelector('#calendar-month').textContent = heading.format(month);
        days.replaceChildren();
        for (let i = 0; i < (month.getDay() + 6) % 7; i++) {
            const spacer = document.createElement('span');
            spacer.setAttribute('aria-hidden', 'true');
            days.append(spacer);
        }
        const count = new Date(month.getFullYear(), month.getMonth() + 1, 0).getDate();
        for (let d = 1; d <= count; d++) {
            const date = new Date(month.getFullYear(), month.getMonth(), d);
            const value = key(date);
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = d;
            button.setAttribute('aria-label', full.format(date));
            button.setAttribute('aria-pressed', String(dates.has(value)));
            if (value === key(today)) button.setAttribute('aria-current', 'date');
            button.addEventListener('click', () => {
                if (dates.has(value)) dates.delete(value); else dates.add(value);
                button.setAttribute('aria-pressed', String(dates.has(value)));
                renderRecap();
                if (dates.size === 0) {
                  status.textContent = '';
                } else if (dates.size === 1) {
                  status.textContent = `1 date sélectionnée`;
                } else {
                  status.textContent =`${dates.size} dates sélectionnées.`;
                }
            });
            days.append(button);
        }
    };
    form.querySelector('#previous-month').addEventListener('click', () => {
        month.setMonth(month.getMonth() - 1);
        render();
    });
    form.querySelector('#next-month').addEventListener('click', () => {
        month.setMonth(month.getMonth() + 1);
        render();
    });
    form.addEventListener('submit', event => {
        if (!dates.size) {
            event.preventDefault();
            status.textContent = 'Sélectionne au moins une date.';
            days.querySelector('button').focus();
        }
    });
    render();
    renderRecap();
});
