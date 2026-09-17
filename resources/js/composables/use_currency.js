/** Формат сумм как в макете: «12 000 €». */
export function formatEuro(value) {
    if (value === null || value === undefined || value === '') return '—';
    const formatted = new Intl.NumberFormat('it-IT', { maximumFractionDigits: 0 }).format(value);
    return `${formatted.replace(/\./g, ' ')} €`;
}
