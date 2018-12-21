jQuery.extend(jQuery.validator.messages, {
    required: "Kjo fushë është e nevojshme.",
    remote: "Ju lutem rregulloni këte fushë.",
    email: "Ju lutem shtypeni një email valid.",
    url: "Ju lutem shtypeni një URL valid.",
    date: "Ju lutem shtypeni një datë valide.",
    dateISO: "Ju lutem shtypeni një datë valide (ISO).",
    number: "Ju lutem shtypeni një numër valide.",
    digits: "Ju lutem shtypeni vetëm numra.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Ju lutem shtypeni vlerën e njejtë.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Ju lutem shtypni së paku {0} karaktere."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});