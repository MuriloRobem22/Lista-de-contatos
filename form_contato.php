<form method="post">
    
    <h4>Nova Tarefa</h4>

    <input type="text" name="nome" placeholder="Nome" />
    <input type="text" name="telefone" placeholder="Telefone"/>
    <input type="text" name="email" placeholder="E-Mail"/>
            
    <input type="submit" value="Cadastrar">




</form>

<form method="GET">
    
    <input type="search" name="procura" placeholder="Procurar contato"/>
    <div>
        <input type="submit" value="Buscar"/>
        <a href='temp.php?procura='>Limpar</a>
    </div>
    
</form>