I60.Plan = {
    show: function (key_plan)
    {
        API.request('Interstate60.Plan.Show', {
            'key_plan': key_plan
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_plan)
    {
        API.request('Interstate60.Plan.Edit', {
            'key_plan': key_plan
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_plan)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Interstate60.Plan.Save', {
            'key_plan': key_plan,
            'plan': jq_block.find('[name="plan"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            I60.Plan.show(key_plan);
        }, function () {

        });
    }
}