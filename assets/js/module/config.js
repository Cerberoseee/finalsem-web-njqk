export const $ = document.querySelector.bind(document);
export const $$ = document.querySelectorAll.bind(document);

function getServer(){
    const currentServer = window.location.hostname;
    const protocol = window.location.protocol;
    const port = window.location.port;

    return `${protocol}//${currentServer}:${port}/finalsem-web-njqk/`;
}

// Save the server url into the session
sessionStorage.setItem("serverURL", getServer());
