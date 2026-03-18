<?php include "bd_contato.php"; ?>
<?php include "queryes_contato.php"; ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Contatos</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <Main>
            <h1>Lista de Contatos</h1>

            
            <!-- formulario de contato -->
            <?php include 'form_contato.php'?>

            <h2>Contatos cadastrados</h2>

            <?php include 'form_pesquisa.php' ?>


            <!-- mostra a lista de contatos cadastrados -->
            <?php include 'tabela_contato.php' ?>

        </main>
    </body>
</html>
