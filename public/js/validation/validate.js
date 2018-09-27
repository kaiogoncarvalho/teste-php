$(document).ready(function() {
    var myLanguage = {
        badEmail : 'Informe um e-mail válido',
        requiredField : 'Campo Obrigatório',
        lengthTooShortStart : 'O valor do campo deve ser maior que ',
        lengthBadEnd : ' caracteres',
        notConfirmed : 'Confirmação está incorreta',
        badDate: 'Informe uma data válida (DD/MM/AAAA)',
        lengthTooLongStart : 'O valor do campo não deve ser maior que ',
        lengthTooLongEnd : ' caracteres',

    };
    $.validate({
        modules : 'security logic',
        language : myLanguage
    });
})