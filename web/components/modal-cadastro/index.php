<div class="modal-register hide-element">
    <div class="modal-container">
        <h3 class="modal-title">
            Criar conta
            <i class="fas fa-times"></i>
        </h3>

        <div class="modal-body">
            <form class="form-register" action="" method="post" enctype="multipart/form-data">
                <div class="input-edit-container">

                    <div class="avatar-block">
                        <label id="avatarLabel" for="avatar"> Seleciona uma foto </label>
                        <input class="hide-element" type="file" id="avatar" name="avatar" accept='image/*' />
                    </div>
                    <input type="text" id="name" placeholder="* Nome" required />
                    <input type="text" id="email" placeholder="* E-mail" required />
                    <input type="text" id="cpf" placeholder="* CPF" required />
                    <input type="tel" id="phone" placeholder="* Telefone" required />
                    <input type="password" id="password" placeholder="* Senha" required />
                </div>

                <div class="button-save-edit">
                    <input type="submit" id="btnRegister" value="Cadastrar" />
                </div>
            </form>
        </div>
    </div>
</div>