// resources/js/echo.js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Make sure to replace these with your actual values
window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY, // Use your Pusher app key
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER, // Use your Pusher app cluster
    encrypted: true,
});

export default echo;
