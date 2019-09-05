<form action="adminCTL.php" method="POST">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" />
            </div>
            <div class="col-md-2">
                <label>CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="999.999.999-99" />
            </div>
            <div class="col-md-3">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" placeholder="exemplo@email.com" />
            </div>
            <div class="col-md-2">
                <label>Status:</label>
                <select id="cbStatus" name="status" class="form-control">
                    <option value="ativo" >Ativo</option>
                    <option value="inativo" >Inativo</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>Celular:</label>
                <input type="tel" name="celular" class="form-control" placeholder="(99)99999-9999" />
            </div>
            <div class="col-md-2">
                <label>Celular comercial:</label>
                <input type="tel" name="celular_com" class="form-control" placeholder="(99)99999-9999" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>CEP:</label>
                <input type="text" name="cep" class="form-control" placeholder="99999-999" />
            </div>
            <div class="col-md-3">
                <label>Logradouro:</label>
                <input type="text" name="logradouro" class="form-control" placeholder="Digite sua Rua ou Avenida" />
            </div>
            <div class="col-md-1">
                <label>Número:</label>
                <input type="number" name="numero" class="form-control" placeholder="9999" />
            </div>
            <div class="col-md-2">
                <label>Bairro:</label>
                <input type="text" name="bairro" class="form-control" placeholder="Digite seu bairro" />
            </div>
            <div class="col-md-2">
                <label>Cidade:</label>
                <input type="text" name="cidade" class="form-control" placeholder="Digite sua cidade" />
            </div>
            <div class="col-md-1">
                <label>Estado:</label>
                <input type="text" name="estado" class="form-control" placeholder="UF" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>Usuário:</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuário para login" />
            </div>
            <div class="col-md-2">
                <label>Senha:</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha para login" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 button-cadastrar-limpar">
                <input type="submit" value="Cadastrar" name="gravar" class="btn btn-success form-control"/>
            </div>
            <div class="col-md-2 button-cadastrar-limpar">
                <input type="reset" value="Limpar" class="btn btn-linkedin form-control">
            </div>
            <div class="col-md-2 button-cadastrar-limpar">
                <input type="button" value="Atualizar" name="atualizar" class="btn btn-tumblr form-control">
            </div>
        </div>
        <h1>
            <?php
            include_once ('./adminCTL.php');
            ?>
        </h1>
    </div>
</form>