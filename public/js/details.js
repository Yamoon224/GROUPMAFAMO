var deleter = function(item) {
    $(item).closest('tr').remove(); 
}

$('#new-row').on('click', function() {
    var rows = $("#tbody tr").length + 1;
    $('#tbody').append(`
        <tr>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                <input type='text' name="details[${rows}][category]" placeholder="categorie" class="form-control form-control-sm" required>
            </td>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                <input type='text' name="details[${rows}][label]" class="form-control form-control-sm" placeholder="Designation" required>
            </td>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                <input type='text' name="details[${rows}][unit]" class="form-control form-control-sm" placeholder="Unité" required>
            </td>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                <input type='number' name="details[${rows}][qty]" class="form-control form-control-sm" step="0.01" min="1" placeholder="Quantité" required>
            </td>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left">
                <input type='number' name="details[${rows}][price]" class="form-control form-control-sm" placeholder="Prix Unitaire" required>
            </td>
            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                <i class="fa fa-trash text-danger" onclick="deleter(this)"></i>
            </td>
        </tr>
    `);
})

$('#new-row-affectation').on('click', function() {
    var rows = $("#tbody-affectation tr").length + 1;
    var employeeId = $('#employeeId').children('option:selected').val()
        employee = $('#employeeId').children('option:selected').text();
    var position = $('#position').val();
    if(position != '') {        
        $('#tbody-affectation').append(`
            <tr>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                    <input type='hidden' name="affectations[${rows}][employee_id]" value="${employeeId}">${employee}
                </td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                    <input type='text' name="affectations[${rows}][position]" value="${position}" required>
                </td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#444444] text-left text-body-color">
                    <i class="fa fa-trash text-danger" onclick="deleter(this)"></i>
                </td>
            </tr>
        `);
    } else {
        alert("Veuillez donner un role");
    }
})