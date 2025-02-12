export default function calendar() {
    return {
        month: new Date().getMonth(),
        year: new Date().getFullYear(),
        days: [],
        blankDays: [],
        get monthYear() {
            return new Date(this.year, this.month).toLocaleString("en-US", {
                month: "long",
                year: "numeric",
            });
        },
        init() {
            this.generateCalendar();
        },
        generateCalendar() {
            let firstDay = new Date(this.year, this.month, 1).getDay();
            let totalDays = new Date(this.year, this.month + 1, 0).getDate();

            this.blankDays = Array(firstDay).fill(null);
            this.days = Array.from({ length: totalDays }, (_, i) => i + 1);
        },
        prevMonth() {
            if (this.month === 0) {
                this.year--;
                this.month = 11;
            } else {
                this.month--;
            }
            this.generateCalendar();
        },
        nextMonth() {
            if (this.month === 11) {
                this.year++;
                this.month = 0;
            } else {
                this.month++;
            }
            this.generateCalendar();
        },
        isToday(day) {
            let today = new Date();
            return (
                day === today.getDate() &&
                this.month === today.getMonth() &&
                this.year === today.getFullYear()
            );
        },
    };
}
