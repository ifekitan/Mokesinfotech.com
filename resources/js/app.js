// Animated counter
document.addEventListener('alpine:init', () => {
    Alpine.data('counter', (target, duration = 2000) => ({
        value: 0,
        start() {
            const step = target / (duration / 16);
            const run = () => {
                this.value = Math.min(this.value + step, target);
                if (this.value < target) requestAnimationFrame(run);
                else this.value = target;
            };
            const observer = new IntersectionObserver(([entry]) => {
                if (entry.isIntersecting) { run(); observer.disconnect(); }
            });
            observer.observe(this.$el);
        },
        get display() {
            return Math.round(this.value).toLocaleString();
        }
    }));
});
