    if (frmmenu.addEventListener) {                   
        frmmenu.addEventListener("submit", validaCadastro);
    } else if (frmmenu.attachEvent) {                  
        frmmenu.attachEvent("onsubmit", validaCadastro);
    }
    
    function validaCadastro(evt){
        var nomemenu = document.getElementById('nome_menu');
        var cliente = document.getElementById('cliente_id');
        var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var contErro = 0;
        var b_email = 0;
    
//        alert(cliente.value);
        /* Validação do campo cliente */
        caixa_cliente = document.querySelector('.msg-cliente');
        if(cliente.value == 0){
            caixa_cliente.innerHTML = "Favor preencher o Nome do Cliente";
            caixa_cliente.style.display = 'block';
            contErro += 1;
        }else{
            caixa_cliente.style.display = 'none';
        }
        

        /* Validação do campo menu */
        caixa_nome = document.querySelector('.msg-nome-menu');
        if(nomemenu.value == ""){
            caixa_nome.innerHTML = "Favor preencher o Nome do Menu";
            caixa_nome.style.display = 'block';
            contErro += 1;
        }else{
            caixa_nome.style.display = 'none';
        }
    

        if(contErro > 0 ){
            evt.preventDefault();
        }
    }
