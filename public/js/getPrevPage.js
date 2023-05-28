redirectPrevPage = () => {
    location.href = (document.referrer) ? document.referrer : '/listNews?page=1';
    return false;
}