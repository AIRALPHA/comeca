<template>
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Produits</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Produits</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title">Produits</h3>
                <button type="button" class="btn btn-outline-success ml-auto" @click="newModal()">
                    <i class="fab fa-product-hunt"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-responsive-md table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <td><img :src="product.images[0].path" alt="" height="50" width="50"></td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.category.name }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.quantity }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" @click="editModal(product)">
                                <i class="fas fa-pencil-alt white">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" @click="deleteProduct(product.id)">
                                <i class="fas fa-trash white">
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>


        <!-- Add User Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalTitle">{{ editMode ? "Modifier " : "Ajouter " }} un produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateProduct() : createProduct()">
                        <div class="modal-body">
                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <!-- User Id
                            <input v-model="form.user_id" type="hidden" :value="user.id" name="user_id"> -->

                            <!-- Images Input -->
                            <div class="form-group">
                                <label for="">Image <small>3 max</small></label>
                                <div id="dZUpload" class="dropzone">
                                    <div class="dz-default dz-message"></div>
                                </div>
                            </div>
                            <!-- Price Input -->
                            <div class="form-group">
                                <label for="price">Prix</label>
                                <input v-model="form.price" type="text" name="price" id="price"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                                <has-error :form="form" field="price"></has-error>
                            </div>

                            <!-- Category Input -->
                            <div class="form-group">
                                <label for="category_id">Categorie</label>
                                <select v-model="form.category_id" type="text" name="category_id" id="category_id"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                    <option value="" selected>Categorie du produit</option>
                                    <option :value="category.id" v-for="category in categories" :key="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <has-error :form="form" field="category_id"></has-error>
                            </div>

                            <!-- Qte Input -->
                            <div class="form-group">
                                <label for="quantity">Quantité</label>
                                <input v-model="form.quantity" type="text" name="quantity" id="quantity"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('quantity') }">
                                <has-error :form="form" field="quantity"></has-error>
                            </div>

                            <!-- Tags Input -->
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <select class="select2" :class="{ 'is-invalid': form.errors.has('tags') }" name="tags" v-model="form.tags" multiple="multiple" id="tags" data-placeholder="Un ou plusieurs tags">
                                        <option :value="tag.id" name="tags[]" v-for="tag in tags" :key="tag.id">
                                            {{ tag.name }}
                                        </option>
                                    </select>
                                    <!--<has-error :form="form" field="tags"></has-error>-->
                                </div>
                            </div>

                            <!-- Description Input -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="form.description" name="description" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" id="description" placeholder="Description du produit !"></textarea>
                                <has-error :form="form" field="description"></has-error>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" v-show="!editMode" class="btn btn-primary">Ajouter</button>
                            <button type="submit" v-show="editMode" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: true,
                products: [],
                categories: [],
                tags: [],
                tas: [],
                form: new Form({
                    id: '',
                    name: '',
                    user_id: '',
                    category_id: '',
                    image: [],
                    price: '',
                    quantity: '',
                    description: '',
                    tags: [],
                }),
            }
        },

        methods: {
            createProduct() {
                this.form.tags = $(".select2").val();
                this.form.user_id = user.id;
                this.$Progress.start();
                this.form.post('/api/product')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        $('#productModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            updateProduct() {
                this.form.tags = $(".select2").val();
                this.$Progress.start();
                this.form.put('/api/product/' + this.form.id)
                    .then((data) => {
                        $('#productModal').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: data.data.message
                        });

                        this.$Progress.finish();
                        Fire.$emit('Aftercreate');
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },

            updateImage(file) {
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.form.image.push(reader.result);
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire(
                        'Oups !',
                        'Fichier trop lourd !',
                        'warning'
                    );
                }
            },

            loadProducts() {
                this.$Progress.start();
                axios.get('/api/product')
                    .then((data) => {
                        this.products = data.data;
                        $(function () {
                            $("#example1").DataTable();
                        })
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            loadCategories() {
                this.$Progress.start();
                axios.get('api/category')
                    .then((data) => {
                        this.categories = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            loadTags() {
                this.$Progress.start();
                axios.get('/api/tag')
                    .then((data) => {
                        this.tags = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            },

            deleteProduct(id) {
                Swal.fire({
                    title: 'Etes vous sure ?',
                    text: "Vous ne pourrez pas revenir sur cela !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui supprimer !'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/product/' + id)
                            .then((data) => {
                                Swal.fire(
                                    'Supprimer !',
                                    data.data.message,
                                    'success'
                                );
                                Fire.$emit('Aftercreate');
                            }, (error) => {
                                Swal.fire(
                                    'Oups !',
                                    'Nous avons rencontré une erreur',
                                    'warning'
                                )
                            });
                    }
                })
            },

            newModal() {
                this.editMode = false;
                this.form.reset();
                $('#productModal').modal('show');
            },

            editModal(product) {
                this.editMode = true;
                this.form.reset();
                $('#productModal').modal('show');
                let tags = [];
                product.tags.forEach((tag) => {
                    tags.push(tag.id.toString());
                });
                $('.select2').val(tags);
                $('.select2').trigger('change');
                this.form.fill(product);
            },

            getImage(name) {
                return "uploads/products/" + name;
            }
        },

        mounted() {
            $('.select2').select2();
            //Simple Dropzonejs
            $("#dZUpload").dropzone({
                url: "/",
                addRemoveLinks: true,
                maxFiles: 3,
                acceptedFiles: 'image/*',
                error:  (file, response) => {
                    file.previewElement.classList.add("dz-success");
                    this.updateImage(file);
                },
                maxfilesexceeded: function(file) {
                    this.removeFile(file);
                }
            });
        },

        created() {
            this.loadCategories();
            this.loadTags();
            this.loadProducts();
            Fire.$on('Aftercreate', () => {
                this.loadProducts();
            });
        }
    }

</script>

<style scoped>
    .dz-image {
        width: 1px;
    }
</style>
