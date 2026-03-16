            <h2>Contatos cadastrados</h2>

            <?php
                // Consulta ao banco

                while ($contato = mysqli_fetch_assoc($resultado)) { 
                ?>
                <article>

                    <div class='dados_contato'> 
                        <?php 
                            echo "<h3 class'nome_contato'>" . $contato['nome'] . "</h3>" ;
                            echo '<p class"tel_contato"> <img src="icone_usuario.png" alt="Usuário" class="icone_usuario">' . $contato['telefone'] . "</p>";
                            echo "<p class'email_contato'>" . $contato['email'] . "</p>";
                            ?> 
                    </div>
                    <div class="botoes_card">
                    <a class="b_excluir" href="temp.php?excluir=<?php echo $contato['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>

                    <a class="b_editar" href='bd_editar.php?id=<?php echo $contato["id"]; ?>'>Editar</a>
                    </div>
                    
                </article>

            <?php   } ?>
           