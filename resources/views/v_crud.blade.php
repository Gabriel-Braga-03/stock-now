<!doctype html>
<html>
    <head>
        <title>Página de Manipulações</title>
        <meta charset="utf-8"/>
        <link rel="icon" href="./img/sn-logo-90x90.png">
        <link rel="stylesheet" href="./css/v_crud.css">
    </head>
    <body>
        <!-- Divisória de Envelope -->
        <div id="wrap">
            <!-- Navbar -->
            <nav class="box">
                <img src="./img/sn-logo-40x40.png"/>
                <h1>Stock<span>Now</span></h1>
                <a href="#">Relatório</a>
                <a href="{{ route('logout') }}">Sair</a>
            </nav>

            <!-- Content -->
            <div id="content">
                 <!-- Formulário -->
                <div class="box w-4">
                    <header class="header">
                        <h2>Atributos de Produto</h2>
                    </header>
                    <hr/>
                    <form class="form" id="main_form" action="{{ route('create.product') }}" method="POST">
                        @csrf
                        <div class="fieldset">
                            <label>Código de Barra:</label>
                            <input name="code_bar" type="text" maxlength="20" autocomplete="off" required/>
                        </div>
                        <div class="fieldset">
                            <label>Nome:</label>
                            <input name="name" type="text" maxlength="50" autocomplete="off" required/>
                        </div>
                        <div class="fieldset half">
                                <label>Quantidade:</label>
                                <input name="qtd" type="number" min="0" max="999999999" required/>
                        </div>
                        <div class="fieldset half">
                                <label>Preço:</label>
                                <input name="price" type="number" min="0.00" max="999999999.99" step="0.01" required/>
                        </div>
                        <div class="fieldset">
                            <input name="btn_salvar" type="submit" value="Salvar"/>
                        </div>
                    </form>
                </div>
                
                <!-- Tabela -->
                <div class="box w-6">
                    <header class="header">
                        <h2>Registros de Produtos</h2>
                    </header>
                    <div class="wrap-table">
                        <table id="main-table" class="table">
                            <thead>
                                <tr>
                                    <th>CB</th>
                                    <th>Nome</th>
                                    <th>QTD</th>
                                    <th>Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Inserindo Tabela -->
                                @if (sizeof($product_regs) > 0)
                                    @foreach ($product_regs as $p)
                                        <tr>
                                            <td>{{$p->code_bar}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->qtd}}</td>
                                            <td>R$ {{$p->price}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="4">Nenhum produto registrado...</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="foot-registros">
                        <button id="btn_del" disabled>Deletar</button>
                        <button id="btn_edit" disabled>Editar</button>
                        <button id="btn_pesq">Pesquisar</button>
                    </div>
                </div>

            </div>
            
        </div>

        <!-- Área de Modais -->
        <div id='mod_edit' class='modal with-back hidden'>
            <header class='modal-header'>
                <h3 class='modal-title'>Preencha para Editar</h3>
                <div class='modal-btn-delete'><div>+</div></div>
            </header>
            <div class='modal-body'>
                <form class="form" method="POST" action="../_controller/C_Principal.php">
                    <input id="edit_hid" type="hidden" name="hf_id">
                    <div class="fieldset">
                        <label>Nome:</label>
                        <input id="nome" name="tf_nome" type="text" maxlength="40" autocomplete="off"/>
                    </div>
                    <div class="fieldset">
                        <label>CPF:</label>
                        <input name="tf_cpf" type="text" maxlength="14" autocomplete="off"/>
                    </div>
                    <div class="fieldset">
                        <input name="btn_editar" type="submit" value="Editar"/>
                    </div>
                </form>
            </div>
        </div>
        <div id='mod_pesq' class='modal with-back hidden'>
            <header class='modal-header'>
                <h3 class='modal-title'>Preencha para Pesquisar</h3>
                <div class='modal-btn-delete'><div>+</div></div>
            </header>
            <div class='modal-body'>
                <form class="form" method="POST" action="../_controller/C_Principal.php">
                    <div class="fieldset">
                        <label>Nome:</label>
                        <input id="nome" name="tf_nome" type="text" maxlength="40" autocomplete="off"/>
                    </div>
                    <div class="fieldset">
                        <label>CPF:</label>
                        <input name="tf_cpf" type="text" maxlength="14" autocomplete="off"/>
                    </div>
                    <div class="fieldset">
                        <input name="btn_pesquisar" type="submit" value="Pesquisar"/>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal de Resultado da Pesquisa -->
        <!-- 
            if (isset($_SESSION['pesq_result'])) {
                echo "
                <div id='mod_pesq_result' class='modal with-back'>
                    <header class='modal-header'>
                        <h3 class='modal-title'>Resultados da Pesquisa</h3>
                        <div class='modal-btn-delete'><div>+</div></div>
                    </header>
                    <div class='modal-body'>
                        <div class='wrap-table'>
                            <table class='tabela'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                    </tr>
                                </thead>
                                <tbody>";

                if (count($_SESSION['pesq_result']) > 0) {
                    foreach ($_SESSION['pesq_result']['ids'] as $index => $id) {
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>{$_SESSION['pesq_result']['nomes'][$index]}</td>
                            <td>{$_SESSION['pesq_result']['cpfs'][$index]}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Sem Registros.</td></tr>";
                }
                echo "
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>";
                unset($_SESSION['pesq_result']);
            }
        -->
    </body>
    
    <!-- Script JS -->
    <script src="./js/v_crud.js"></script>

</html>