import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

Nova.request()
    .get("/nova-vendor/alertable/initialize-pusher")
    .then(response => {

        var EchoBroadcaster = new Echo({
            broadcaster: 'pusher',
            key: response.data.key,
            cluster: response.data.cluster,
            encrypted: true
        });

        EchoBroadcaster.private('alertable.' + response.data.user_id)
                   .listen('.Marshmallow\\Alertable\\Events\\AlertNotificationEvent', (e) => {
                       alert(e.alert_message);
                   });
    })
    .catch(error => {
        console.log(error);
    });
