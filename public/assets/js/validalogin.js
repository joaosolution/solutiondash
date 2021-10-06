    if (frmlogin.addEventListener) {                   
        frmlogin.addEventListener("submit", validaCadastro);
    } else if (frmlogin.attachEvent) {                  
        frmlogin.attachEvent("onsubmit", validaCadastro);
    }
    
    function validaCadastro(evt){
        var nome = document.getElementById('nome');
        var email = document.getElementById('usuario');
        var senha = document.getElementById('senha');
        var senha2 = document.getElementById('confirmar_senha');
        var tipologin = document.getElementById('tipo_login');
        var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var contErro = 0;
        var b_email = 0;
    
    
        /* Validação do campo nome */
        caixa_nome = document.querySelector('.msg-nome');
        if(nome.value == ""){
            caixa_nome.innerHTML = "Favor preencher o Nome";
            caixa_nome.style.display = 'block';
            contErro += 1;
        }else{
            caixa_nome.style.display = 'none';
        }
    
        /* Validação do campo email*/
        caixa_email = document.querySelector('.msg-email');
        if(email.value == ""){
            caixa_email.innerHTML = "Favor preencher o E-mail";
            caixa_email.style.display = 'block';
            contErro += 1;
        }else if(filtro.test(email.value)){
            caixa_email.style.display = 'none';
        }else{
            caixa_email.innerHTML = "Formato do E-mail inválido";
            caixa_email.style.display = 'block';
            contErro += 1;
        }	
    
    
        /* Validação do campo senha */
        caixa_senha = document.querySelector('.msg-senha');
        if(senha.value == ""){
            caixa_senha.innerHTML = "Favor preencher a Senha";
            caixa_senha.style.display = 'block';
            contErro += 1;
        }else if(senha.value.length < 6){
            caixa_senha.innerHTML = "Favor preencher a Senha com o mínimo de 6 caracteres";
            caixa_senha.style.display = 'block';
            contErro += 1;
        }else{
            caixa_senha.style.display = 'none';
        }

        /* Validação do campo confirmar_senha */
        caixa_senha2 = document.querySelector('.msg-confirmar_senha');
        if(senha2.value == ""){
            caixa_senha2.innerHTML = "Favor preencher a Confirmação da Senha";
            caixa_senha2.style.display = 'block';
            contErro += 1;
        }else if(senha2.value.length < 6){
            caixa_senha2.innerHTML = "Favor preencher a Confirmação da Senha com o mínimo de 6 caracteres";
            caixa_senha2.style.display = 'block';
            contErro += 1;
        }else{
            caixa_senha2.style.display = 'none';
        }


    
        /* Valida se a senha é igual ao campo repita a senha */
        if(senha.value != "" && confirmar_senha.value != "" && senha.value != confirmar_senha.value){
            caixa_senha2.innerHTML = "O campo Repita a Senha é diferente do campo Senha";
            caixa_senha2.style.display = 'block';
            contErro += 1;
        }
        

        /* Validação do campo tipo login */
        caixa_tipo = document.querySelector('.msg-tipo');
        if(tipologin.value == ""){
            caixa_tipo.innerHTML = "Favor preencher o Tipo de Acesso";
            caixa_tipo.style.display = 'block';
            contErro += 1;
        }else{
            caixa_tipo.style.display = 'none';
        }



        /* Pesquisa no controller/login no método check_email se o e-mail já existe no BD
           Se Sim retorna S se não retorna N *
        alert("<?= base_url('login/check_email')?>/"+email.value);
        $.ajax({
            async: false,
            type: "GET",
            url: "<?= base_url('login/check_email')?>/"+email.value,
            data: $(this).serialize(),
            success: function(mensagem){
                alert(mensagem);
                if(mensagem == "S") {
                    b_email = 1;
                } else{
                    b_email = 0;
                }
            }
        });

        if(b_email == 1){
            caixa_email.innerHTML = "E-mail já cadastrado para outro usuário!";
            caixa_email.style.display = 'block';
            contErro += 1;
        }
        */

        if(contErro > 0 ){
            evt.preventDefault();
        }
    }
