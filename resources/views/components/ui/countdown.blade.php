<div x-data="countdown('{{ $targetDate }}')" x-init="init()">
    <div class="flex flex-col flex-grow">
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center">
                <x-ui.h1 x-text="days" class="text-4xl font-bold leading-none tracking-tight"></x-ui.h1>
                <p class="mb-5 text-neutral-500 dark:text-neutral-400">Days</p>
            </div>
            <div class="text-center">
                <x-ui.h1 x-text="hours" class="text-4xl font-bold leading-none tracking-tight"></x-ui.h1>
                <p class="mb-5 text-neutral-500 dark:text-neutral-400">Hours</p>
            </div>
            <div class="text-center">
                <x-ui.h1 x-text="seconds" class="text-4xl font-bold leading-none tracking-tight"></x-ui.h1>
                <p class="mb-5 text-neutral-500 dark:text-neutral-400">Seconds</p>
            </div>
        </div>
    </div>
</div>


<script>
    function countdown(targetDate) {
        return {
            targetDate: new Date(targetDate),
            days: '00',
            hours: '00',
            seconds: '00',
            message: '',

            init() {
                this.updateCountdown();
                setInterval(() => this.updateCountdown(), 1000);
            },

            updateCountdown() {
                const now = new Date();
                const difference = this.targetDate - now;

                if (difference < 0) {
                    this.message = 'Countdown finished!';
                    return;
                }

                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                this.days = days.toString().padStart(2, '0');
                this.hours = hours.toString().padStart(2, '0');
                this.seconds = seconds.toString().padStart(2, '0');
            }
        };
    }
</script>
