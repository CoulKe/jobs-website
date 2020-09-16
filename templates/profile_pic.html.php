<form action="file.php" method="post" id="upload-profile" enctype="multipart/form-data">
    <label for="Upload">Add profile picture: </label> <br>
    <input type="file" name="pic"> <br>
    <input type="submit" value="submit" id="submit">
</form>
<div class="output"></div>

<!-- <script>
    let picLink = document.querySelector('#add-pic-link');
    picLink.addEventListener('click', function(e) {
        e.preventDefault();
        picLink.style = 'display: none';

    });
    let form = document.querySelector('form');
    let file = document.querySelector('#submit');
    let outputDiv = document.querySelector('.output');

    file.addEventListener('click', sendImage);

    function sendImage(e) {
        let data = new FormData(form);
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'file.php');
        xhr.onload = function() {
            outputDiv.innerHTML = this.responseText
            xhr = '';
        }
        xhr.send(data);
    }
</script> -->