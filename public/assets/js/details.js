var deleter = function(item) {
    $(item).closest('tr').remove(); 
}

$('#btn-new-row-quotations').on('click', function() {
    var rows = $("#quotations-body tr").length + 1;
    $('#quotations-body').append(`
        <tr>
            <td><input type="text" name="details[${rows}][category]" placeholder="Categorie" class="form-control form-control-sm" required></td>
            <td><input type="text" name="details[${rows}][label]" placeholder="Désignation" class="form-control form-control-sm" required></td>
            <td><input type="text" name="details[${rows}][unit]" placeholder="Unité" class="form-control form-control-sm" required></td>
            <td><input type="text" name="details[${rows}][qty]" placeholder="Quantité" class="form-control form-control-sm" required></td>
            <td><input type="text" name="details[${rows}][price]" placeholder="Prix Unitaire" class="form-control form-control-sm" required></td>
            <td><a role="button" title="Supprimer cette Ligne" class="btn btn-sm btn-soft-danger"><i class="uil uil-trash-alt text-danger" onclick="deleter(this)"></i></a></td>
        </tr>
    `);
})

$('#btn-new-row-affectation').on('click', function() {
    var rows = $("#affectations-body tr").length + 1;
    var employeeid = $('#employee-id').children('option:selected').val()
        employee = $('#employee-id').children('option:selected').text(), 
        position = $('#position').val();
    if(position != '') {        
        $('#affectations-body').append(`
            <tr>
                <td><input type='hidden' name="affectations[${rows}][employee_id]" value="${employeeid}">${employee}</td>
                <td><input type='text' name="affectations[${rows}][position]" class="form-control form-control-sm" value="${position}" required></td>
                <td><a role="button" title="Supprimer cette Ligne" class="btn btn-sm btn-soft-danger"><i class="uil uil-trash-alt text-danger" onclick="deleter(this)"></i></a></td>
            </tr>
        `);
    } else {
        alert("Veuillez donner un role");
    }
})