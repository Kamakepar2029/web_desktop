<input tabindex="2" type="email" class="text required email" name="user_email" id="user_email" value="">
<script>
var endings = ["mail.ru", "list.ru", "rambler.ru", "yandex.ru", "gmail.com"],
    symbols = "qwertyuiopasdfghjklzxcvbnm1234567890";
 
function rand(min, max) {
    return (min + Math.random() * (max - min + 1)) | 0
}
 
function getRandomStr(len) {
    var ret = ""
    for (var i = 0; i < len; i++)
        console.log(ret += symbols[rand(0, symbols.length - 1)]);
    return ret;
}
 
function getEmail() {
    var a = getRandomStr(rand(3, 5)),
        b = getRandomStr(rand(3, 5));
    return a + "." + b + "@" + endings[rand(0, endings.length - 1)];
}
 
user_email.value = getEmail()
</script>