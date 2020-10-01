<!DOCTYPE html>
<html>
<head lang="ja">
    <meta charset="UTF-8">
    <title>Laranuxt</title>
</head>
<body>
<h1>Laravel</h1>
<button id="id_get">Go To Nuxt By GET</button>
<button id="id_post">Go To Nuxt By POST</button>

<form name="form" method="POST">
    @csrf
</form>
<script>
    (()=>{
        document.getElementById("id_get").addEventListener("click", ()=>{
            document.location.href = "/nuxt";
        }, false);
        document.getElementById("id_post").addEventListener("click", ()=>{
            document.forms['form'].action = "/nuxt/";
            document.forms['form'].submit();
        }, false);
    })();
</script>
</body>
</html>
