const now = new Date();

// See: https://www.joereiss.net/geek/geek.html
function getGeekCodeAgeSuffix() {
    const birthday = new Date('1981-10-30');
    const ageMs = now.getTime() - birthday.getTime();
    const ageYears = ageMs / (1000 * 60 * 60 * 24 * 365.25);

    // 9 and under
    if (ageYears < 10) {
        return '-----';
    }
    // 15 - 19
    else if (ageYears >= 10 && ageYears < 15 ) {
        return '----';
    }
    // 15 - 19
    else if (ageYears >= 15 && ageYears < 20 ) {
        return '---';
    }
    // 20 - 24
    else if (ageYears >= 20 && ageYears < 25 ) {
        return '--';
    }
    // 25 - 29
    else if (ageYears >= 25 && ageYears < 30 ) {
        return '-';
    }
    // 30 - 39
    else if (ageYears >= 30 && ageYears < 40 ) {
        return '';
    }
    // 40 - 49
    else if (ageYears >= 40 && ageYears < 50 ) {
        return '+';
    }
    // 50 - 59
    else if (ageYears >= 50 && ageYears < 60 ) {
        return '++';
    }
    // 60 and up
    else if (ageYears >= 60) {
        return '+++';
    }
}

module.exports = {
    currentYear: now.getFullYear(),
    geekCodeAgeSuffix: getGeekCodeAgeSuffix(),

};
