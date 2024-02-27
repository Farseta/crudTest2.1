var controller = new Vue({

    el: '#controller',
    data: {
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        editStatus: false,
    },
    mounted: function () {
        this.datatable();

    },

    methods: {
        datatable() {
            const _this = this;
            _this.table = $('#datatable').DataTable({

                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns: columns,
                // responsive: true,

            }).on('xhr', function () {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            this.data = {};

            this.editStatus = false;
            $("#modal-xl").modal();

        },
        editData(event, row) {
            this.data = this.datas[row];
            console.log(this.data);
            // this.data = data;

            this.editStatus = true;
            $("#modal-xl").modal();
        },
        deleteData(event, id) {
            // this.actionUrl = '{{ url('authors') }}' + '/' + id;
            if (confirm("wanna delete this one?")) {
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl + '/' + id, {
                    _method: 'DELETE'
                }).then(response => {
                    // location.reload();
                    alert("data have been deleted")
                })
            }
            console.log(id);
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modal-xl').modal('hide');
                _this.table.ajax.reload();
            });
        }

    }
});