import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;
function excerpt(text, maxLength) {
    if (text.length <= maxLength) {
        return text;
    } else {
        return text.slice(0, maxLength) + "...";
    }
}

window.Echo = new Echo({
    //mengoneksikan ke pusher
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
// const test = $("page-header-notifications-dropdown")
// console.log(test)
// $(".noti-dot").addClass("d-none");
if (window.userId) {
    window.Echo.private(`users.${window.userId}`).listen(
        "MessageDelivered",
        ({ message }) => {
            console.log("berhasil listen ke pusher");
            $("#empty-notif").addClass("d-none")
            $("#notification-items").append(
                /* html */
                `<div class="text-reset notification-item">
                    <div class="d-flex">
                        <div class="flex-1">
                            <h6 class="mb-1">${excerpt(message.subject, 16)}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1">${excerpt(
                                    message.sender_message,
                                    100
                                )}</p>
                            </div>
                        </div>
                    </div>
                </div>`
            );
            $(".noti-dot").removeClass("d-none");

            //bagian halaman message
            const newMessageContainer = $("#new-message");
            newMessageContainer.append(/*html */ `
                <div class="col-lg-6">
                    <div class="card border border-success">
                        <div class="card-header bg-transparent border-success">
                            <h5 class="my-0 text-success">
                                <i class="mdi mdi-check-all me-3"></i>Pesan Baru
                            </h5>
                        </div>
                        <div class="card-body">
                            <p>
                                <strong>Subjek </strong
                                ><span class="ms-2 me-2">: </span> ${message.subject}
                            </p>

                            <p>
                                <strong>Nama </strong
                                ><span class="ms-2 me-2">: </span> ${message.sender_name}
                            </p>
                            <p>
                                <strong>Email </strong
                                ><span class="ms-2 me-2">: </span> ${message.sender_email}
                            </p>
                            <p>
                                <strong>Phone </strong
                                ><span class="ms-2 me-2">: </span> ${message.sender_phone}
                            </p>
                            <strong>Pesan </strong><span class="ms-2">: </span>
                            <p class="card-text">
                                ${message.sender_message}
                            </p>
                        </div>
                    </div>
                </div>
            `);
        }
    );
}
