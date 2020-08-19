const monthNames = [
  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
  'Spetember', 'October', 'November', 'December'
];

function toDate(stringOrDate) {
  if (!(stringOrDate instanceof Date)) {
    return new Date(stringOrDate);
  }
  // it's already a date
  return stringOrDate;
}


function monthDay(date) {
  return toDate(date).getUTCDate();
}


function monthName(monthIndexOrDate) {
  let monthIndex = monthIndexOrDate;
  if (typeof monthIndex !== 'number') {
    monthIndex = toDate(monthIndexOrDate).getUTCMonth();
  }
  return monthNames[monthIndex];
}

const weekdayNames = [
  'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
  'Saturday'
];

function weekdayName(weekdayIndexOrDate) {
  let weekdayIndex = weekdayIndexOrDate;
  if (typeof weekdayIndex !== 'number') {
    weekdayIndex = toDate(weekdayIndexOrDate).getUTCDay();
  }
  return weekdayNames[weekdayIndex];
}

function year(date) {
  return toDate(date).getUTCFullYear();
}

/**
 * Formats a JS Date object into a human-friendly "Monday, 1. January 2020" format.
 *
 * @param {Date|string} date
 */
function humanUTCDate(date) {
  return `${weekdayName(date)}, ${monthDay(date)}. ${monthName(date)} ${year(date)}`;
}

function urlMonth(monthIndexOrDate) {
  let monthIndex = monthIndexOrDate;
  if (typeof monthIndex !== 'number') {
    monthIndex = toDate(monthIndexOrDate).getUTCMonth();
   }
   return monthIndex < 9 ? `0${monthIndex + 1}` : `${monthIndex + 1}`;
}

function urlDay(dayOrDate) {
  let day = dayOrDate;
  if (typeof day !== 'number') {
    day = toDate(dayOrDate).getUTCDate();
   }
   return day < 10 ? `0${day}` : `${day}`;;
}


module.exports = {
  monthDay,
  monthName,
  weekdayName,
  year,
  humanUTCDate,

  urlDay,
  urlMonth,
};
