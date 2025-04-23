export function formatDistance(data) {
    let value = data;
    let unit = 'km';

    if (data >= 1_000_000_000) {
        value = data / 1_000_000_000;
        unit = 'bil. km';
    } else if (data >= 1_000_000) {
        value = data / 1_000_000;
        unit = 'mil. km';
    }

    const formattedValue = new Intl.NumberFormat('en-US', {
        maximumFractionDigits: 1,
    }).format(value);

    return `${formattedValue} ${unit}`;
}

export function formatDays(data) {
    const daysInMonth = 30;
    const daysInYear = 365;
    let value = data;
    let unit = 'days';

    if (data >= daysInYear) {
        value = data / daysInYear;
        unit = 'years';
    } else if (data >= daysInMonth) {
        value = data / daysInMonth;
        unit = 'months';
    }

    const formattedValue = new Intl.NumberFormat('en-US', {
        maximumFractionDigits: 0,
    }).format(value);

    return `${formattedValue} ${unit}`;
}
