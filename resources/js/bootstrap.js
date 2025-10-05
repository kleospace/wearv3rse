import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Optional: Echo/Pusher kannst du später ergänzen, wenn nötig

