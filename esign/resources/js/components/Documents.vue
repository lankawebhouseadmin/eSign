<template>
    <div class="container-fluid">
        <div class="position-relative">
            <div class="folder-list-wrapper">
                <section class="header-my-files">
                    <h3 class="folder-navigation">My Documents</h3>
                </section>
                <div class="folder-container mt-3">
                    <button @click="testMethod()">Test Me!</button>
                    <ul>
                        <li>
                            <a href="/uploads">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">Uploads</div>
                            </a>
                        </li>
                        <li>
                            <a href="/paused">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">Paused</div>
                            </a>
                        </li>
                        <li>
                            <a href="/my-signed-documents">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">My Signed Documents</div>
                            </a>
                        </li>
                        <li>
                            <a href="/deleted">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">Deleted</div>
                            </a>
                        </li>
                        <li>
                            <a href="/history">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">History</div>
                            </a>
                        </li>
                        <li>
                            <a href="/signed">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text">Signed</div>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="file-content">
                <div class="file-container">
                    <div class="empty-folder text-center">
                        This folder is empty
                    </div>
                    <div class="text-center drag-drop-box">
                        <br/>
                        <div class="drag-text">Drag and drop files onto this windows to upload.</div>

                        <label style="font-size: 16px;margin: 10px 0;">Or</label>
                        <br/>
                        <a href="#" title="Upload Files"><i class="fa fa-upload mr-2" aria-hidden="true"></i>Click here to upload.</a>

                    </div>
                </div>
            </div>
            <div class="file-tool">
                <ul class="file-tool-list">
                    <li>
                        <a href="#" title="Upload Files"><i class="fa fa-upload mr-2" aria-hidden="true"></i>Upload Documents</a>
                    </li>
                    <li>
                        <a href="#" title="New Folder"><i class="fa fa-folder-o mr-2" aria-hidden="true"></i>New Folder</a>
                    </li>
                </ul>
            </div>
        </div>

        <!--MODAl FOR NEW FOlDER CREATE-->
        <div class="modal fade" id="modal-new-folder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create New Folder</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="alert" style="display:none; margin-top: 10px;"></div>
                            <form v-on:submit.prevent="createFolder" id="myform" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Folder Name</label>

                                        <div class="col-sm-7">
                                            <input type="text" name="name" class="form-control" v-model="formData.name">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <!-- /.box-footer -->
                                <div class="modal-footer pb-0">
                                    <button id="btn_submit" type="submit" class="btn btn-purple">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--END-->

        <notifications animation-type="velocity"/>
        <loading v-show="showLoader"></loading>
    </div>
</template>

<script>
    import notify from './shared/Notify'
    require('../main');
    export default {
        name: "documents",
        data: function () {
            return {
                showLoader: false,
                url: 'create-folder',
                folders: [],
                formData: {
                    id: 0,
                    parentId:0,
                    userId: '',
                    name: ''
                }
            }

        },
        created: function () {
            this.showLoader = false;
        },
        components: {

        },
        methods: {
            getFolders: function () { // get the annual rate
                Axios.get('get-folders').then((response) => {
                    this.showLoader = false;
                    if (response.data.success) {
                        this.folders = response.data.data.securities;
                    } else {
                        notify.methods.notifyError(response.data.error.message);
                    }
                })
                .catch((error) => {
                    this.showLoader = false;
                    notify.methods.notifyError('Something went wrong. Please refresh the page.');
                })
            },
            createFolder: function () { // save annual rate
                this.showLoader = true;
                Axios.post(this.url, this.formData)
                    .then((response) => {
                        this.showLoader = false;
                        if (response.data.success) {
                            notify.methods.notifySuccess(response.data.message);
                            $('#modal-new-folder').modal('hide');
                            this.getFolders();
                        } else {
                            if (response.data.error.statusCode === 103) {
                                notify.methods.notifyError(response.data.error.errorDescription);
                            } else {
                                notify.methods.notifyError(response.data.error.message);
                            }
                        }
                    })
                    .catch((error) => {
                        this.showLoader = false;
                        notify.methods.notifyError('Something went wrong. Please try again.');
                    })
            },
            testMethod: function () {
                notify.methods.notifySuccess('this is success message');
            }
        }
    }
</script>
