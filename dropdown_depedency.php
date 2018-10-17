<html>
<head>
  <title>Test Vuejs</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/select2.css">
</head>
<body>
  <div class="container">
    <div class="panel-body" id="app">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width: 20px;">No</th>
            <th style="width: 130px;">Category</th>
            <th style="width: 130px;">Subcategory</th>
          </tr>
        </thead>
        <tbody>
          <button class="btn btn-primary btn-xs" @click="addRow(rows.length-1)">add row</button>
          <tr v-for="row in rows" track-by="$index">
            <td>
              {{ $index +1 }}
            </td>
            <td>
              <select v-select="row.selectedCategory" id="category" style="width: 300px; height: 1em;">
				<option></option>
                <option v-for="item in categories" v-bind:value="item.id">
                  {{ item.name }}
                </option>
              </select>
            </td>
            <td>
              <select v-select="row.selectedSubCategory" id="subcategory" style="width: 300px; height: 1em;">
				<option></option>
                <option v-for="item in subcategories | filterBy row.selectedCategory in 'category_id'" v-bind:value="item.id">
                  {{ item.name }}
                </option>
              </select>
            </td>
            <td>
              <button class="btn btn-primary btn-xs" @click="addRow($index)">add row</button>
              <button class="btn btn-danger btn-xs" @click="removeRow($index)">remove row</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button class="btn btn-success" @click="postData()">SUBMIT DATA</button>
      <pre>{{ $data.rows | json }}</pre>
    </div>
  </div>

  <!--javascript-->
  <script src="assets/jquery.min.js" type="text/javascript"></script>
  <script src="assets/select2.full.min.js" type="text/javascript"></script>
  <script src="assets/vue.js" type="text/javascript"></script>
  <script src="assets/vue-resource.js" type="text/javascript"></script>

  <script>
  Vue.directive('select', {
  twoWay: true,
  priority: 1000,

  params: ['options'],

  bind: function() {
    var self = this
    $(this.el)
    .select2({
      data: this.params.options, placeholder: "Choose"
    })
    .on('change', function() {
      self.set(this.value)
    })
	.on('select2:opening', function() {
      self.set(this.value)
    })
  },
  update: function(value) {
    $(this.el).val(value).trigger('change')
  },
  unbind: function() {
    $(this.el).off().select2('destroy')
  }
});
  
  var vm = new Vue({
    el: '#app',
    data: {
      rows: [],
      categories: [],
      subcategories: []
    },
    ready: function() {
      this.initCategories();
    },
    methods: {
      addRow: function (index) {
        try {
          this.rows.splice(index + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRow: function (index) {
        this.rows.splice(index, 1);
      },
      initCategories: function() {
        // GET /someUrl
        this.$http.get('json/get_categories.php').then((response) => {
          // success callback
          this.$set('categories', response.data.categories)
        }, (response) => {
          // error callback
        });
        this.$http.get('json/get_sub_categories.php').then((response) => {
          // success callback
          this.$set('subcategories', response.data.subcategories)
        }, (response) => {
          // error callback
        });
      },
      postData: function () {
        $.ajax({
          context: this,
          type: "POST",
          data: '{ "rows": '+JSON.stringify(this.rows)+', "sender": [{"nama" : "Admin"}]}',
		  success: function(jsonData) {
			alert('Status: ' + jsonData.message + ', code: ' + jsonData.status_code);
		  },
			error: function(jsonData, textStatus, errorThrown) { 
				alert('Status: ' + textStatus + ', "' + errorThrown + '"' + ', code: ' + jsonData.status); 
			}, 
			url: "action/store_dropdown_depedency.php"
        });
      }
    }
  });
  </script>
</body>
</html>
