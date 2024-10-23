<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Einfaches PHP MVC</title>
</head>

<body>

<section>
    <h1>Mein Produkt:</h1>
    <ul>
        <li><?php echo $product->getTitle(); ?></li>
        <li><?php echo $product->getDescription(); ?></li>
        <li><?php echo $product->getPrice(); ?></li>
        <li><?php echo $product->getSku(); ?></li>
        <li><?php echo $product->getImage(); ?></li>
    </ul>
    <section>

        <form name="form1" id="mainForm" method="post" enctype="multipart/form-data" action="">
            <fieldset>

                <!-- Text input-->
                <span>Titel</span>
                <input id="title" name="title" type="text">

                <br><br>

                <!-- Text input-->
                <span>Beschreibung</span>
                <input id="description" name="description" type="text">

                <br><br>

                <!-- Text input-->
                <span>Telefon</span>
                <input id="telefon" name="telefon" type="text">

                <br><br>

                <!-- Number input -->
                <span>Preis</span>
                <input id="price" name="price" type="number">

                <br><br>

                <!-- Text input -->
                <span>SKU</span>
                <input id="sku" name="sku" type="text">

                <br><br>

                <!-- Button -->
                <!-- File input -->
                <span>Bild</span>
                <input id="image" name="image" type="file">

                <br><br>

                <!-- Button -->
                <button id="submit" name="submit">Absenden</button>

            </fieldset>
        </form>
</body>

</html>
