<!doctype html>
<html>
    <head>
        <title>Página Inicial</title>
        <meta charset="utf-8"/>
        <link rel="icon" href="./img/sn-logo-90x90.png">
        <link rel="stylesheet" href="./css/v_inicial.css">
    </head>
    <body>
        <!-- Divisória de Envolpe -->
        <div id="wrap">
            <!-- Área de Login e Cadastro -->
            <div id="area-lc">
                <div id="panel-lc">
                    <header id="tabs">
                        <div class="tab selected">Entrar</div>
                        <div class="tab">Cadastrar</div>
                    </header>
                    <div id="area-user-icon">
                        <img src="./img/user-icon-200x200.png"/>
                    </div>
                    <div id="contents">
                        <form class="tab-content" action="{{ route('login') }}" method="GET">
                            @csrf
                            <div class="fieldset">
                                <label for="">Nome de Usuário:</label>
                                <input name="name" type="text" maxlength="50" autocomplete="off" required/>
                            </div>
                            <div class="fieldset">
                                <label for="">Senha:</label>
                                <input name="password" type="password" maxlength="14" autocomplete="off" required/>
                            </div>
                            <div class="fieldset">
                                <input value="Entrar" type="submit"/>
                            </div>
                        </form>
                        <form class="tab-content hidden" action="{{ route('create.user') }}" method="POST">
                            @csrf
                            <div class="fieldset">
                                <label for="">Novo Nome:</label>
                                <input name="name" type="text" maxlength="50" autocomplete="off" required/>
                            </div>
                            <div class="fieldset">
                                <label for="">Nova Senha:</label>
                                <input name="password" type="password" maxlength="14" autocomplete="off" required/>
                            </div>
                            <div class="fieldset">
                                <input value="Cadastrar" type="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Área de Logo -->
            <div id="area-logo">
                <img src="./img/sn-logo-400x400.png"/>
            </div>
        </div>
    </body>

    <!-- Scripts JS -->
    <script src="./js/v_inicial.js"></script>
</html>