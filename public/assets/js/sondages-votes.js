document.addEventListener('DOMContentLoaded', () => {
    // Ces codes sont également les valeurs envoyées dans reponses[date].
    const states = [
        { className: 'yes', label: 'oui', symbol: '✓' },
        { className: 'maybe', label: 'peut-être', symbol: '?' },
        { className: 'no', label: 'non', symbol: 'X' },
    ];

    document.querySelectorAll('[data-vote-cell]').forEach(cell => {
        const input = cell.querySelector('input[type="hidden"]');
        const button = cell.querySelector('.poll-vote');
        cell.addEventListener('click', () => {
            const next = (Number(input.value) + 1) % states.length;
            const state = states[next];
            input.value = String(next);
            cell.classList.remove('yes', 'maybe', 'no');
            cell.classList.add(state.className);
            button.textContent = state.symbol;
            button.setAttribute('aria-label', `${button.dataset.date} : ${state.label}. Cliquer pour choisir ${states[(next + 1) % states.length].label}.`);
        });
    });
});
