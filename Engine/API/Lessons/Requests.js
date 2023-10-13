/**
 * Blueprints request function list.
 *
 * @type {{edit: API.Blueprints.edit, show: API.Blueprints.show, save: (function(*=): (undefined)), create: (function(*=): (undefined)), remove: (function(*=): (undefined))}}
 */
API.Lessons = {
    schedule: function (date_now)
    {
        API.request('Blueprint.Lessons.Schedule', {
            'date_now': date_now
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    collection: function (key_problem)
    {
        API.request('Blueprint.Lessons.Collection', {
            'key_problem': key_problem
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    show: function (uid)
    {
        API.request('Blueprint.Blueprints.Show', {
            'uid': uid
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    create: function (key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Lessons.Create', {
            'key_problem': key_problem
        }, function (data) {
            API.Lessons.collection(key_problem);
        }, function () {

        });
    },

    remove: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Blueprint.Lessons.Remove', {
            'key_lesson': key_lesson
        }, function (data) {
            API.Lessons.collection(key_problem);
        }, function () {

        });
    },

    edit: function (key_lesson)
    {
        API.request('Blueprint.Lessons.Edit', {
            'key_lesson': key_lesson
        }, function (data) {
            $('#map').html(data.render);
        }, function () {

        });
    },

    save: function (key_lesson, key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Blueprint.Lessons.Save', {
            'key_lesson': key_lesson,
            'comment': jq_block.find('[name="comment"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            API.Lessons.collection(key_problem);
        }, function () {

        });
    }
}