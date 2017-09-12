<html>
    <head> 

        </SCRIPT>
    </head>
<body>
    <form>
        <input required>
        <button>Submit</button>
    </form>
    <script>
        document.querySelector( "form" )
            .addEventListener( "invalid", function( event ) {
            event.preventDefault();
        }, true );
    </script>
</body>
</html>