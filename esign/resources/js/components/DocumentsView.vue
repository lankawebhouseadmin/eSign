<template>
    <div class="container-fluid">
        <div class="position-relative">
            <div class="folder-list-wrapper">
                <section class="folder-navigation">
                    <h3 class="folder-navigation" @click="getFolders">
                        My Documents
                    </h3>
                    <button v-if="folderNavigationArray.length" type="button"
                            class="btn access-button form-btn"
                            style="padding: 2px 10px;box-shadow: none;"
                            @click="getBackToFolders">
                        <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Go Back
                    </button>

                </section>
                <div class="folder-container mt-3">
                    <ul v-if="folders.length">
                        <li v-for="(folder, index) in folders" class="folder-box position-relative">
                            <a class="link-btn" @click="getSubFolderAndFiles(folder.id, folder.name)">
                                <div class="folder">
                                    <i class="fa fa-folder mr-2" aria-hidden="true"></i>
                                </div>
                                <div class="folder-text" v-bind:title="folder.name">{{folder.name}}</div>
                            </a>
                        </li>
                    </ul>
                    <div v-if="!folders.length && !documents.length" class="empty-directory">This folder is empty.</div>
                    <div class="clearfix"></div>
                </div>

                <div class="documents-container">
                    <ul v-if="documents.length">
                        <li v-for="(document, index) in documents">
                            <!--<a class="link-btn" @click="previewDocument(document.id)">-->
                            <a class="link-btn" @click="viewDocument(document.id)">
                                <i v-bind:class="getDocumentIcon(document.file_name)" class="file" ></i><span class="folder-text" v-bind:title="document.file_name">{{document.file_name}}</span>

                            </a>
                            <span class="document-delete pull-right" @click="deleteDocument(document.id)">
                                    <i class="fa fa-trash "></i>
                                </span>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="file-content">
                <div class="page-title col-lg-12 clearfix">
                    <h3>Sign document</h3>
                    <div class="pull-left backBtn"><button type="button" class="btn btn-md access-button form-btn" @click="backToDocuments" style="padding: 2px 10px; box-shadow: none;"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Go Back To Documents</button></div>
                    <div class="pull-right page-actions">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="ion-arrow-down-b"></i> More </button>
                            <!--<ul class="dropdown-menu" data-id="<?php echo $file['id']; ?>" data-key="<?php echo $file['sharing_key']; ?>" data-sharing-link="<?php echo $siteUrl."/open/".$file['sharing_key']; ?>" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)"   data-toggle="modal" data-target="#send">
                                <i class="ion-ios-email-outline"></i> <span>Send</span></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation" ><a role="menuitem" tabindex="-1" href="javascript:void(0)" class="share-doc"  data-toggle="modal" data-target="#share">
                                <i class="ion-ios-world-outline"></i> <span>Share link</span></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)" class="replace-file" data-toggle="modal" data-target="#replaceFile">
                                <i class="ion-ios-loop"></i><span> Replace</span></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)" class="requestf-sign" data-toggle="modal" data-target="#request-sign">
                                <i class="ion-ios-plus-outline"></i><span> Request Sign</span></a></li>
                            <li role="presentation" class="divider"></li>
                            <?php if($file['status'] == "unsigned"){ ?>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $siteUrl; ?>/uploads/files/<?php echo $file['filename']; ?>" download>
                                <i class="ion-ios-cloud-download-outline"></i><span> Download</span></a></li>
                            <?php }else{ ?>
                            <li role="presentation"><a role="menuitem" tabindex="-1"  href="javascript:void(0)" data-toggle="modal" data-target="#download" data-signed="<?php echo $siteUrl; ?>/uploads/files/<?php echo $file['filename']; ?>" data-unsigned="<?php echo $siteUrl; ?>/uploads/files/original/<?php echo $file['filename']; ?>">
                                <i class="ion-ios-cloud-download-outline"></i><span> Download</span></a></li>
                            <?php } ?>
                            <?php if($canDelete){ ?>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" class="delete-document" tabindex="-1" href="javascript:void(0)">
                                <i class="ion-ios-trash-outline"></i> <span>Delete</span></a></li>
                            <?php } ?>
                            </ul>-->
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="light-card document filePreview">
                            <div class="document-pagination">
                                <div class="pull-left">
                                    <button @click="onPrevPage" id="prev" class="btn btn-primary btn-round"><i class="fa fa-arrow-left"></i></button>
                                    <button @click="onNextPage" id="next" class="btn btn-primary btn-round"><i class="fa fa-arrow-right"></i></button>
                                </div>
                                <div class="pull-right">
                                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>

                                </div>
                            </div>
                            <!--<div class="document-load">
                                <i class="ion-loading-c"></i>
                            </div>-->
                            <div class="text-center">
                                <div id="document-map" class="document-map" @click="tempSignature($event)" v-bind:style="{height:canvasHeight+'px',width:canvasWidth+'px'}" v-on:dragover="handleDragOver($event)" v-on:drop="handleDrop($event)" ></div>
                                <canvas v-if="pdfFile" ref="theCanvas" id="the-canvas" v-bind:height="canvasHeight" v-bind:width="canvasWidth" ></canvas>
                                <!--<VueDocPreview v-else v-bind:value="docPreviewUrl" type="office" />-->
                                <iframe v-else v-bind:src="docPreviewUrl" width="100%" height="1000px" frameborder="0"></iframe>
                            </div>
                                <!--<iframe src="https://docs.google.com/viewer?url=http://13.71.190.166/fees_report_2018-10.pdf&embedded=true" style="width:600px; height:500px;" frameborder='0'></iframe>-->
                                <!--<iframe v-if="pdfFile"  class="img" v-bind:src="docPreviewUrl" width="100%" height="500px" border="0"></iframe>-->
                                <!--<div v-if="pdfFile" id="holder"></div>
                                &lt;!&ndash;<VueDocPreview v-else v-bind:value="docPreviewUrl" type="office" />&ndash;&gt;
                                <iframe v-else v-bind:src="docPreviewUrl" width="100%" height="1000px" frameborder="0"></iframe>-->
                        </div>
                    </div>







                </div>
            </div>
            <div class="file-tool">
                <ul class="file-tool-list" id="file-tool-list">

                    <li>
                        <a class="link-btn" title="User Signatures" @click="showHideUserSignatures"><i class="fa fa-edit mr-2" aria-hidden="true"></i>User Signatures</a>
                        <ul v-if="userSignatures">
                            <li><a class="link-btn" title="New Signature" @click="createNewSignature"><i class="fa fa-edit mr-2" aria-hidden="true"></i>New Signature</a></li>
                            <li><a title="Upload Signature" class="link-btn" @click="uploadSignature"><i aria-hidden="true" class="fa fa-upload mr-2"></i>Upload Signature.</a></li>
                        </ul>
                    </li>

                    <li v-if="showPreview" class="mt-3">
                        <a class="link-btn" title="Tools" @click="openTools"><i class="fa fa-gear mr-2" area-hidden="true"></i>Tools</a>
                    </li>
                </ul>
                <div v-if="docTools">
                    <ul>
                        <li class="mt-3">
                            <a class="link-btn" ><i class="fa fa-pencil"></i>Sign</a>
                            <ul>
                                <li><label><input type="checkbox" value="create" v-model="signOptions" v-on:change="changeSignOptions"><span>Create Signature</span></label></li>
                                <li><label><input type="checkbox" value="stored" v-model="signOptions" v-on:change="changeSignOptions"><span>Stored Signature</span></label></li>
                            </ul>

                        </li>
                    </ul>
                </div>
                <!--<div><ul class="signs"><li><a id="1" class="link-btn"><img src="http://localhost:8000/storage/1/signatures/1543995430.png" draggable="true" style="width: 50px; height: 50px;"> <span title="1543995430.png" class="folder-text">1543995430.png</span></a> <span class="document-delete pull-right"><i class="fa fa-trash "></i></span></li><li><a id="2" class="link-btn"><img src="http://localhost:8000/storage/1/signatures/1543996234.png" draggable="true" style="width: 50px; height: 50px;"> <span title="1543996234.png" class="folder-text">1543996234.png</span></a> <span class="document-delete pull-right"><i class="fa fa-trash "></i></span></li></ul></div>-->
                <!--<div v-bind:class="storedSignature" class="signsDiv">
                    <ul v-if="signaures.length" class="signs">
                        <li v-for="(signaure, index) in signaures">
                            <a class="link-btn" v-bind:id="signaure.id">
                                <img v-bind:src="signaure.file_path" v-bind:draggable=true  style="width:50px;height:50px" />
                                <span class="folder-text" v-bind:title="signaure.file_name">{{signaure.file_name}}</span>

                            </a>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>

        <button class="btn btn-danger btn-round sign" @click="sign" data-toggle="tooltip" data-placement="top" title="Sign Document"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-info btn-round write" @click="write" data-toggle="tooltip" data-placement="top" title="Add text"><i class="fa fa-edit"></i></button>
        <!--<div class="request-sign-option">
            <button class="btn btn-success accept" @click="acceptSigning">Accept</button>
            <button class="btn btn-danger decline" @click="declineSigning">Decline</button>
        </div>-->

        <!-- request sign Modal -->
        <div class="modal fade" id="request-sign" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Request signature</h4>
                    </div>
                    <form class="request-send-file" data-parsley-validate="">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-12 p-lr-o">
                                    <label>Email address</label>
                                    <input type="text" class="form-control receiver-email" name="email" placeholder="Email address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 p-lr-o">
                                    <label>Add a Note</label>
                                    <textarea class="form-control receiver-note" placeholder="Add a note" name="note" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 p-lr-o">
                                    <label><input type="checkbox" class="js-switch restricted" name="restricted" value="1" /> Receiver to sign specific points</label>
                                    <p><i>You will have to select signing point when checked otherwise the receiver will be allowed to sign anywhere</i></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <!-- Share Modal -->
        <div class="modal fade" id="share" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Share</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <div class="col-md-12 p-lr-o">
                                    <label>Sharing link</label>
                                    <input type="text" id="foo" class="form-control" value="https://signer.simcycreative.com/open/dshbd7yr7dnindiqy3" placeholder="Sharing link" readonly="readonly">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary copy-link"  data-clipboard-action="copy" data-clipboard-target="#foo">Copy Link</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Share Modal -->
        <div class="modal fade" id="download" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Download</h4>
                    </div>
                    <div class="modal-body download-option-btns">
                        <i class="ion-ios-cloud-download-outline"></i>
                        <h2>Download signed or signed version?</h2>
                        <p>The unsigned vesion is the original file uploaded without any editing.</p>
                        <a href="<?php echo $siteUrl; ?>/uploads/files/<?php echo $file['filename']; ?>" class="btn btn-primary" download>Signed</a>
                        <a href="<?php echo $siteUrl; ?>/uploads/files/original/<?php echo $file['filename']; ?>" class="btn btn-default" download>UnSigned</a>
                    </div>
                </div>

            </div>
        </div>



        <!--MODAl FOR NEW IGNATURE CREATE-->
        <div v-bind:class="getSignatureModalClass()" class="modal1 SignatureModal" id="modal-new-signature">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Signature</h4>
                        <button type="button"@click="closeNewSignatureModal" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div v-if="userUploadSignatures && !overwriteSign" class="box-body wrapper">
                            <label>Upload Signature File</label>
                            <input type="file" accept="image/*" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div v-else-if="!userUploadSignatures && !overwriteSign" class="box-body wrapper">
                            <VueSignaturePad width="500px" height="240px" ref="signaturePad" />
                            <!--<canvas class="signature"></canvas>-->
                        </div>
                        <div v-if="overwriteSign" class="signatureList">
                            <p>Select Signature to replace with new:</p>
                            <ul v-if="signaures.length" class="">
                                <li v-for="(signaure, index) in signaures">
                                    <a class="link-btn" @click="replaceSignature(signaure.id)" v-bind:id="signaure.id">
                                        <img v-bind:src="signaure.file_path" v-bind:draggable=true  style="width:50px;height:50px" />
                                        <span class="folder-text" v-bind:title="signaure.file_name">{{signaure.file_name}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div v-if="userUploadSignatures" class="modal-footer">
                        <button @click="saveUserSignatures" class="btn btn-blue form-btn">Save</button>
                    </div>
                    <div v-else class="modal-footer">
                        <button @click="save" class="btn btn-blue form-btn">Save</button>
                        <button @click="undo" class="btn btn-danger form-btn">Undo</button>
                        <button @click="clear" class="btn btn-danger form-btn">Clear</button>
                    </div>

                </div>
            </div>
        </div>
        <div v-if="isDocumentPasswordProtected" class="SignatureModal">
            <div class="modal-dialog">
                <form v-on:submit.prevent="getUserPass" id="passform" class="form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Provide Document Passsword</h4>
                            <button type="button"@click="closeDocPassword" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-froup">
                                <label>Document Passord:</label>
                                <input type="password" class="form-control" placeholder="Password" required v-model="passData.password" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-blue form-btn">Open Document</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <notifications animation-type="velocity"/>
        <loading v-show="showLoader"></loading>

        <div class="loading-overlay"><i class="ion-loading-c"></i></div>
        <div class="sign-overlay">
            <div class="pull-left sign-overlay-btns">
                <div class="tools">
                    <div class="signatures">
                        <div v-bind:class="storedSignature" class="signsDiv">
                            <ul v-if="signaures.length" class="signs">
                                <li v-for="(signaure, index) in signaures">
                                    <a class="link-btn" v-bind:id="signaure.id">
                                        <img v-bind:src="signaure.file_path" v-bind:draggable=true  style="width:100%" />
                                        <!--<span class="folder-text" v-bind:title="signaure.file_name">{{signaure.file_name}}</span>-->

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right sign-overlay-btns">
                <div class="overlay-btn close-overlay bg-danger" @click="closeOverlay" data-toggle="tooltip" data-placement="left" title="Close"><i class="fa fa-times"></i></div>
                <div class="overlay-btn undo-sign bg-warning"  @click="undoSign" data-toggle="tooltip" data-placement="left" title="Undo"><i class="fa fa-refresh"></i></div>
                <div class="overlay-btn save-file bg-success" @click="saveFile" v-bind:document-url="docPreviewUrl"  data-toggle="tooltip" data-placement="left" title="Save"><i class="fa fa-check"></i></div>
            </div>
        </div>
        <div class="data-holder hidden" signature="<?php echo $signature; ?>"></div>
        <div class="temporary-signatures-holder"></div>
        <div class="temporary-text-holder"></div>

    </div>
</template>

<script>
    import notify from './shared/Notify'
    import common from './shared/Common'
    import VueSignaturePad from 'vue-signature-pad';
    Vue.use(VueSignaturePad);
    require('../main');
    export default {
        name: "DocumentsView",
        props:['fileData'],
        data: function () {
            return {
                showLoader: false,
                folders: [],
                documents: [],
                currentFolder: {
                    parentId:0,
                },
                folderNavigationArray: [],
                docPreviewUrl: '',
                showPreview: false,
                pdfFile: true,
                pad: 'closed',
                fData:{signatureData:'',type:'',replaceSignId:'',fileext:''},
                docTools:false,
                userSignatures:false,
                userUploadSignatures:false,
                createSignature:false,
                storedSignature:'closed',
                signaures: [],
                signOptions: [],
                file: '',
                overwriteSign: false,
                isDocumentPasswordProtected:false,
                passData:{
                    password:'',
                    passProtctedDocUrl:''
                },
                pdfDoc: null,
                pageNum: 1,
                pageRendering: false,
                pageNumPending: null,
                scale: 1,
                ctx: '',
                canvasHeight:'',
                canvasWidth:'',
                docMapStyle:'',
                signData:{docId:'',docUrl:'',positions:'',signType:'sign'},
                documentId:'',
            }
        },
        mounted:function(){
            var docData = JSON.parse(this.fileData);
            this.docPreviewUrl = docData.url;
            this.documentId = docData.id;
            var canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d'),
                canvasContainer = document.getElementById('document-map');
            this.ctx = ctx;



            /**
             * Asynchronously downloads PDF.
             */
            this.getPreview(this.docPreviewUrl);

        },
        created: function () {
            this.showLoader = true;
            this.getFolders();
            this.getPreview(this.docPreviewUrl);
        },
        methods: {
            /**
             * Get the all parent folder
             * */
            getFolders: function () {
                this.showLoader = true;
                const url = common.data().serverPath + 'get-folders';
                Axios.get(url).then((response) => {
                    this.showLoader = false;
                    if (response.data.success) {
                        this.folders = response.data.data.folders;
                        this.documents = response.data.data.documents;
                        this.signaures = response.data.data.signatures;
                        this.currentFolder.parentId = 0;
                        this.folderNavigationArray = [];
                    } else {
                        notify.methods.notifyError(response.data.error.message);
                    }
                })
                    .catch((error) => {
                        this.showLoader = false;
                        notify.methods.notifyError('Something went wrong. Please refresh the page.');
                    })
            },

            /**
             * get the sub folders and files
             * @param folderId
             */
            getSubFolderAndFiles: function (folderId, pushNavigation = true) { // get the annual rate
                this.showLoader = true;
                const url = common.data().serverPath + 'get-sub-folders/' + folderId;
                Axios.get(url).then((response) => {
                    this.showLoader = false;
                    if (response.data.success) {
                        this.folders = response.data.data.folders;
                        this.documents = response.data.data.documents;
                        this.currentFolder.parentId = folderId;
                        if (pushNavigation) {
                            this.folderNavigationArray.push(folderId);
                        }

                    } else {
                        notify.methods.notifyError(response.data.error.message);
                    }
                })/*.catch((error) => {
                    alert('failed');
                    this.showLoader = false;
                    notify.methods.notifyError('Something went wrong. Please refresh the page.');
                })*/
            },

            /**
             * got back to recent folder
             *
             */
            getBackToFolders: function() {
                //this.showDeleteButton = false;
                const folderId = this.folderNavigationArray[this.folderNavigationArray.length - 2];
                if (typeof folderId === 'undefined') {
                    this.getFolders();
                } else {
                    this.getSubFolderAndFiles(folderId, false);
                    this.folderNavigationArray.splice(-1);

                    //console.log(this.folderNavigationArray);
                }

            },

            /**
             * delete the specific document
             * @param id
             */
            deleteDocument: function (id) { // save annual rate
                if (confirm("Are you sure you want to delete this document?")) {
                    this.showLoader = true;
                    const url = common.data().serverPath + 'delete-document/' + id;
                    Axios.delete(url)
                        .then((response) => {
                            this.showLoader = false;
                            if (response.data.success) {
                                notify.methods.notifySuccess(response.data.message);
                                if (this.currentFolder.parentId > 0) {
                                    this.getSubFolderAndFiles(this.currentFolder.parentId, false);
                                } else {
                                    this.getFolders();
                                }

                            } else {
                                notify.methods.notifyError(response.data.error.message);
                            }
                        })
                        .catch((error) => {
                            this.showLoader = false;
                            notify.methods.notifyError('Something went wrong. Please try again.');
                        })
                }
            },

            backToDocuments : function(){
                this.showPreview = false;
            },
            getDocumentIcon: function (fileName){
                var ext = fileName.substr(fileName.lastIndexOf('.') + 1);
                var icon = (ext === 'pdf') ? 'fa fa-file-pdf-o' : 'fa fa-file-word-o';
                return icon;
            },
            /**
             * get document Preview
             */
            getPreview : function(url){

                // Loaded via <script> tag, create shortcut to access PDF.js exports.
                var pdfjsLib = window['pdfjs-dist/build/pdf'];

                // The workerSrc property shall be specified.
                //pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

                pdfjsLib.disableWorker = true;
                // Asynchronous download of PDF
                if(this.passData.password){
                    var loadingTask = pdfjsLib.getDocument({ url: this.passData.passProtctedDocUrl, password: this.passData.password });
                    this.isDocumentPasswordProtected = false;
                    this.passData.password = '';
                }else{
                    var loadingTask = pdfjsLib.getDocument(url);
                }
                loadingTask.promise.then((pdf) => {
                    this.pdfDoc = pdf;
                    document.getElementById('page_count').textContent = pdf.numPages;
                    if(pdf.numPages == 1){
                        $("#next, #prev").addClass("disabled");
                    }
                    // Initial/first page rendering
                    this.renderPage(this.pageNum);
                }, (reason)=> {
                    //console.log(reason);
                    // PDF loading error
                    var passError = reason.name
                    if(passError=='PasswordException'){
                        /*if(reason.code == 1){
                            notify.methods.notifyError('Document is Password protected.'+reason.message);
                        }*/
                        notify.methods.notifyError(reason.message);
                        this.isDocumentPasswordProtected = true;
                        this.passData.passProtctedDocUrl = url;
                        this.showLoader = false;
                    }
                });
            },

            /**
             * Opend create new signature pop-up
             */
            openNewSignatureModal: function() {
                this.pad = 'open';
            },
            /**
             * Close create new signature pop-up
             */
            closeNewSignatureModal: function() {
                this.pad = 'closed';
                if(this.userUploadSignatures == false)
                    this.undo();
            },
            getSignatureModalClass: function(){
                return this.pad;
            },
            /**
             * undo signature pad
             */
            undo() {
                this.$refs.signaturePad.undoSignature();
            },
            /**
             * save signature pad canvas
             */
            save() {
                //const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
                const reurned = this.$refs.signaturePad.saveSignature();
                if(!reurned.isEmpty){
                    this.showLoader = true;
                    /*const url = common.data().serverPath + 'create-signature';*/
                    this.fData.signatureData = reurned.data;
                    this.fData.type = 'create';
                    this.fData.fileext = '';
                    if(this.signaures.length >= 6){
                        this.fData.replaceSignId='';
                        this.overwriteSign = true;
                        this.showLoader = false;
                    }else{
                        this.saveSignature();
                    }
                    /*Axios.post(url, this.fData).then((response) => {
                        this.showLoader = false;
                        if (response.data.success) {
                            notify.methods.notifySuccess(response.data.message);
                            this.pad = 'closed';
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
                    })*/
                }else{
                    notify.methods.notifyError('Returned empty signature.Please try again.');
                }


            },
            /**
             * clear signature pad canvas
             */
            clear:function () {
                this.$refs.signaturePad.clearSignature();
            },

            openTools: function(){
                this.docTools=true;
            },
            storedSignatures: function(){
                this.showLoader = true;
                const url = common.data().serverPath + 'get-signatures';
                Axios.get(url).then((response) => {
                    this.showLoader = false;
                    if (response.data.success) {
                        this.signaures = response.data.signatures;
                    } else {
                        notify.methods.notifyError(response.data.error.message);
                    }
                })
                    .catch((error) => {
                        this.showLoader = false;
                        notify.methods.notifyError('Something went wrong. Please refresh the page.');
                    })
            },
            changeSignOptions: function(){
                var optss = this.signOptions;
                if(optss.includes('stored')){
                    this.storedSignature='open';
                }else{
                    this.storedSignature='closed';
                }
                if(optss.includes('create')){
                    this.createSignature=true;
                }else{
                    this.createSignature=false;
                }

            },
            showHideUserSignatures :function(){
                if(this.userSignatures == true){
                    this.userSignatures = false;
                }else{
                    this.userSignatures = true;
                }
            },
            createNewSignature: function(){
                this.userUploadSignatures = false;
                this.openNewSignatureModal();
            },
            uploadSignature: function(){
                this.userUploadSignatures = true;
                this.openNewSignatureModal();
            },
            saveUserSignatures: function () {
                this.showLoader = true;
                this.getBase64(this.file).then(
                    data => {
                        this.fData.signatureData = data;
                        this.fData.type = 'upload';
                        if(this.signaures.length >= 6){
                            this.fData.replaceSignId='';
                            this.overwriteSign = true;
                            this.showLoader = false;
                        }else{
                            this.saveSignature();
                        }
                    }

                );


            },
            handleFileUpload: function(){
                this.file = this.$refs.file.files[0];
            },
            /**
             * save signature to database
             */
            saveSignature: function(){
                this.showLoader = true;
                const url = common.data().serverPath + 'create-signature';

                Axios.post(url, this.fData).then((response) => {
                    this.storedSignatures();
                    this.showLoader = false;
                    if (response.data.success) {
                        notify.methods.notifySuccess(response.data.message);
                        this.pad = 'closed';
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
            replaceSignature: function(signatureId){
                this.fData.replaceSignId = signatureId;
                this.overwriteSign = false;
                this.saveSignature();
            },
            getBase64: function(file){
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    this.fData.fileext = file.name.split('.').pop().toLowerCase();
                    reader.onload = () => resolve(reader.result);
                    reader.onerror = error => reject(error);
                });
            },
            closeDocPassword: function(){
                this.isDocumentPasswordProtected = false;
                this.passData.passProtctedDocUrl = '';
                this.passData.password = '';
            },
            getUserPass: function(){
                this.showLoader = true;
                this.getPreview(this.passData.passProtctedDocUrl);
            },
            viewDocument: function (documentId) {
                //console.log(documetnId);
                window.location.href = common.data().serverPath + 'myfiles/view/' + this.currentFolder.parentId + '/' + documentId;
            },
            renderPage: function (pageNum) {
                $(".temporary-signature").hide();
                /*$(".document-load").show();*/
                this.pageRendering = true;
                // Using promise to fetch the page
                this.pdfDoc.getPage(pageNum).then((page)=> {
                    var viewport = page.getViewport(this.scale);
                    this.canvasHeight = viewport.height;
                    this.canvasWidth = viewport.width;
                    /*this.docMapStyle = 'height:'+viewport.height+'px;width:'+viewport.width;
                    console.log('docMapStyle'+this.docMapStyle);*/
                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: this.ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    // Wait for rendering to finish
                    renderTask.promise.then(()=> {
                        /*$(".document-load").hide();*/
                        $("[page="+pageNum+"]").show();
                        if(pageNum == this.pdfDoc.numPages){
                            $("#next").addClass("disabled");
                        }else{
                            $("#next").removeClass("disabled");
                        }

                        if(pageNum == 1){
                            $("#prev").addClass("disabled");
                        }else{
                            $("#prev").removeClass("disabled");
                        }

                        this.pageRendering = false;
                        if (this.pageNumPending !== null) {
                            // New page rendering is pending
                            this.renderPage(this.pageNumPending);
                            this.pageNumPending = null;
                        }
                        this.showLoader = false;
                    });
                });

                // Update page counters
                document.getElementById('page_num').textContent = pageNum;
            },
            /**
             * Displays previous page.
             */
            onPrevPage: function() {
                if (this.pageNum <= 1) {
                    return;
                }
                this.pageNum--;
               this.queueRenderPage(this.pageNum);
            },
            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            queueRenderPage: function(num) {
                if (this.pageRendering) {
                    this.pageNumPending = num;
                } else {
                    this.renderPage(num);
                }
            },
            /**
             * Displays next page.
             */
            onNextPage: function () {
                if (this.pageNum >= this.pdfDoc.numPages) {
                    return;
                }
                this.pageNum++;
                this.queueRenderPage(this.pageNum);
            },
            // get signature position
            /*signPositions: function(event) {
                var offset = $(".document-map").offset();
                var docLeft = parseInt(event.pageX - offset.left);
                var docTop = parseInt(event.pageY - offset.top);
                console.log("pageX: " + docLeft + ", pageY: " +docTop );
            },*/
            // put temporary signature
            tempSignature: function(event){
                /*var  map = leftPosition = topPosition = signature = "";

                if($("body").hasClass("sign")){
                    map = $(".document-map").offset();
                    leftPosition = parseInt(event.pageX - 101);
                    topPosition = parseInt(event.pageY - 4);
                    signature = "assets/images/mark.png";
                    /!*if ($("body").hasClass("request")) {
                        signature = "assets/images/mark.png";
                    }else{
                        signature = "uploads/signatures/" + $(".data-holder").attr("signature");
                    }*!/

                    $(`<img src="` + signature + `"  class="temporary-signature draggable" page="` + this.pageNum + `" style="left: ` + leftPosition + `px; top: ` + topPosition + `px;" data-left="` + parseInt(leftPosition - map.left + 29)+ `" data-top="` + parseInt(topPosition - map.top + 18) + `">`).appendTo(".temporary-signatures-holder").draggable({
                        drag: function() {
                            var map = $(".document-map").offset();
                            var offset = $(this).offset();
                            var xPos = parseInt(offset.left - map.left + 29);
                            var yPos = parseInt(offset.top - map.top + 18);
                            $(this).attr("data-top", yPos);
                            $(this).attr("data-left", xPos);
                        }
                    });
                }else if($("body").hasClass("write")){
                    map = $(".document-map").offset();
                    leftPosition = parseInt(event.pageX + 8);
                    topPosition = parseInt(event.pageY - 4);
                    if ($("body").hasClass("request")) {
                        signature = "assets/images/mark.png";
                    }else{
                        signature = "uploads/signatures/" + $(".data-holder").attr("signature");
                    }

                    $(`<div class="writing-pad draggable" contenteditable="true"  spellcheck="false"  page="` + this.pageNum + `" style="left: ` + leftPosition + `px; top: ` + topPosition + `px;" data-left="` + parseInt(leftPosition - map.left + 29)+ `" data-top="` + parseInt(topPosition - map.top + 17) + `"></div>`).appendTo(".temporary-text-holder").draggable({
                        drag: function() {
                            var map = $(".document-map").offset();
                            var offset = $(this).offset();
                            var xPos = parseInt(offset.left - map.left + 29);
                            var yPos = parseInt(offset.top - map.top + 18);
                            $(this).attr("data-top", yPos);
                            $(this).attr("data-left", xPos);
                        }
                    });
                    $('.temporary-text-holder').children().last().focus();

                }*/
            },
            // when sign now is clicked
            sign: function () {
                this.storedSignature='open';
                $("body").addClass("sign");
                function handleDragStart(e) {
                    [].forEach.call(images, function (img) {
                        img.classList.remove('img_dragging');
                    });
                    this.classList.add('img_dragging');
                }

                function handleDragEnd(e) {
                    [].forEach.call(images, function (img) {
                        img.classList.remove('img_dragging');
                    });
                }
                var images = document.querySelectorAll('.signs img');
                [].forEach.call(images, function (img) {
                    img.addEventListener('dragstart', handleDragStart, false);
                    img.addEventListener('dragend', handleDragEnd, false);
                });
            },
            // when Add text is clicked
            write: function () {
                $("body").addClass("write");
            },
            //when Undo clicked
            undoSign: function () {
                $('.temporary-signatures-holder').children().last().remove();
                $('.temporary-text-holder').children().last().remove();
            },
            // close sign mode
            closeOverlay: function () {
                $("body").removeClass("sign");
                $("body").removeClass("write");
                $('.temporary-signatures-holder').empty();
                $('.temporary-text-holder').empty();
            },
            saveFile: function () {
                if ($("body").hasClass("write")) {
                    if($(".writing-pad").length == 0){
                        swal({
                            title: "Please write Something!",
                            text: "Please write Something before saving.",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonText: "Okay",
                            closeOnConfirm: true
                        });
                    }else{
                        var myArr = [];
                        $('.temporary-text-holder').find(".writing-pad").each(function(index, value) {
                            myArr.push({
                                text: $(this).text(),
                                pageNumber: $(this).attr('page'),
                                xPosition: $(this).attr('data-left'),
                                yPosition: $(this).attr('data-top')
                            });
                        });
                        this.signDocument(JSON.stringify(myArr));
                    }
                }else if ($("body").hasClass("request")) {
                    if($(".temporary-signature").length == 0){
                        swal({
                            title: "No Signing points!",
                            text: "You have not selected any signing points, click continue to allow receiver to sign anywhere or cancel to select signing points",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonText: "continue",
                            closeOnConfirm: true
                        }, function(){
                            this.sendNonRestrictedSigningRequest();
                        });
                    }else{
                        this.sendRestrictedSigningRequest();
                    }
                }else{
                    if($(".temporary-signature").length == 0){
                        swal({
                            title: "Please sign!",
                            text: "Please sign before saving.",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonText: "Okay",
                            closeOnConfirm: true
                        });
                    }else{
                        var myArr = [];
                        $('.temporary-signatures-holder').find(".temporary-signature").each(function(index, value) {
                            myArr.push({
                                signatureFile: $(this).attr('src'),
                                pageNumber: $(this).attr('page'),
                                xPosition: $(this).attr('data-left'),
                                yPosition: $(this).attr('data-top')
                            });
                        });
                        this.signDocument(JSON.stringify(myArr));
                    }

                }
            },
            // send signing request and allow sign anywhere
            sendNonRestrictedSigningRequest: function (){
                $("body").addClass("loading");
                var action = "signrequest",
                    form = $(".request-send-file"),
                    email = form.find(".receiver-email").val(),
                    note = form.find(".receiver-note").val(),
                    restricted = 0,
                    positions = "",
                    url = "files/sendemails.php";
                // Send the data using post
                var posting = $.post(url, { action: action, positions: positions, sharingKey: sharingKey, email: email, note: note, restricted: restricted });
                posting.done(function(data) {
                    $("body").removeClass("loading");
                    responseText = jQuery.parseJSON(data);
                    if (responseText.status == 1) {
                        $("#request-sign").modal('hide');
                        this.restrictedReset()
                        $(".request-send-file")[0].reset();
                        $("body").removeClass("sign request");
                        swal({
                            title: "Request sent!",
                            text: "Document signing request was successfully sent..",
                            type: "success",
                            showCancelButton: false
                        });
                    } else {
                        swal({
                            title: "Oops!",
                            text: "Failed to send request, please try again.",
                            type: "error",
                            showCancelButton: false
                        });
                    }

                })
            },
            // send signing request and allow sign of specific points
            sendRestrictedSigningRequest: function(){
                $("body").addClass("loading");
                var myArr = [];
                $('.temporary-signatures-holder').find(".temporary-signature").each(function(index, value) {
                    myArr.push({
                        pageNumber: $(this).attr('page'),
                        xPosition: $(this).attr('data-left'),
                        yPosition: $(this).attr('data-top')
                    });
                });
                myJson = JSON.stringify(myArr);
                var action = "signrequest",
                    positions = myJson,
                    form = $(".request-send-file"),
                    email = form.find(".receiver-email").val(),
                    note = form.find(".receiver-note").val(),
                    restricted = 1,
                    url = "files/sendemails.php";
                // Send the data using post
                var posting = $.post(url, { action: action, positions: positions, sharingKey: sharingKey, email: email, note: note, restricted: restricted });
                posting.done(function(data) {
                    $("body").removeClass("loading");
                    responseText = jQuery.parseJSON(data);
                    if (responseText.status == 1) {
                        this.restrictedReset()
                        $(".request-send-file")[0].reset();
                        $("body").removeClass("sign request");
                        swal({
                            title: "Request sent!",
                            text: "Document signing request was successfully sent..",
                            type: "success",
                            showCancelButton: false
                        });
                    } else {
                        swal({
                            title: "Oops!",
                            text: "Failed to send request, please try again.",
                            type: "error",
                            showCancelButton: false
                        });
                    }
                });
            },
            signDocument: function(positions){
                //console.log(positions);
                //$("body").addClass("loading");
                this.showLoader=true;
                const url = common.data().serverPath + 'sign-signature';
                this.signData.docId = this.documentId;
                this.signData.docUrl = this.docPreviewUrl;
                this.signData.positions = positions;
                console.log(this.signData);
                Axios.post(url, this.signData).then((response) => {
                    this.showLoader = false;
                    //console.log(response);
                    /*if (response.data.success) {
                        notify.methods.notifySuccess(response.data.message);
                        this.pad = 'closed';
                    } else {
                        if (response.data.error.statusCode === 103) {
                            notify.methods.notifyError(response.data.error.errorDescription);
                        } else {
                            notify.methods.notifyError(response.data.error.message);
                        }
                    }*/
                })
                .catch((error) => {
                    this.showLoader = false;
                    notify.methods.notifyError('Something went wrong. Please try again.');
                })


                /*var action = "sign",
                    title = "Document signed!",
                    activity = "signed";
                url = "files/ajaxProcesses.php";


                if ($("body").hasClass("write")) {
                    action = "write",
                        title = "Document updated!",
                        activity = "written";
                }

                var posting = $.post(url, { action: action, documentKey: sharingKey, signingKey: signingKey, positions: positions, signingMode: signingMode });
                posting.done(function(data) {
                    $("body").removeClass("loading");
                    responseText = jQuery.parseJSON(data);
                    if (responseText.status == 1) {
                        $("body").removeClass("sign");
                        swal({
                            title: title,
                            text: "Your document has been successfully "+activity,
                            type: "success",
                            showCancelButton: false,
                            confirmButtonText: "View "+activity+" Document",
                            closeOnConfirm: true
                        }, function() {
                            $("body").addClass("loading");
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: "Oops!",
                            text: "Document signing failed, please try again.",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonText: "Try again",
                            closeOnConfirm: true
                        });
                    }
                });*/
            },
            restrictedReset: function() {
                var restricted = $(".restricted");
                if(restricted.is(':checked')){
                    $(".restricted").click();
                }
            },
            // decline signing invitation
            declineSigning: function(){
                swal({
                    title: "Are you sure!",
                    text: "Are you sure you want to deline the signing invitation.",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#ff1a1a",
                    confirmButtonText: "Yes decline",
                    closeOnConfirm: true
                }, function(){
                    $("body").addClass("loading");
                    var action = "decline",
                        url = "files/sendemails.php";
                    // Send the data using post
                    var posting = $.post(url, { action: action, signingKey: signingKey, sharingKey: sharingKey });
                    posting.done(function(data) {
                        $("body").removeClass("loading");
                        responseText = jQuery.parseJSON(data);
                        if (responseText.status == 1) {
                            swal({
                                title: "Invitation declined!",
                                text: "You have successfully declined the signing invitation.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: "Go to dashboard",
                                closeOnConfirm: false
                            }, function(){
                                window.location.href = "dashboard";
                            })
                        } else {
                            swal({
                                title: "Oops!",
                                text: "Failed to complete request, please try again.",
                                type: "error",
                                showCancelButton: false
                            });
                        }

                    })
                });
            },
            // accept signing invitation
            acceptSigning: function(){
                if (signRestricted == 1) {
                    swal({
                        title: "One click sign!",
                        text: "The sender wants specific points signed, click sign now and we will sign for you.",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonText: "Sign now",
                        closeOnConfirm: true
                    }, function(){
                        this.signDocument(signingPoints);
                    })

                }else if(signRestricted == 0){
                    $("body").addClass("sign");
                }
            },
            handleDragOver: function(e){
                if (e.preventDefault) {
                    e.preventDefault();
                }
                e.dataTransfer.dropEffect = 'copy';
                return false;
            },
            handleDrop: function(e){
                e = e || window.event;
                if (e.preventDefault) {
                    e.preventDefault();
                }
                if (e.stopPropagation) {
                    e.stopPropagation();
                }
                var  map = "",leftPosition = "",topPosition = "",signature = "";
                if($("body").hasClass("sign")){
                    map = $(".document-map").offset();
                    leftPosition = parseInt(e.pageX - 101);
                    topPosition = parseInt(e.pageY - 4);
                    if ($("body").hasClass("request")) {
                        signature = "assets/images/mark.png";
                        //need to add code for base64 datauri
                    }else{
                        //console.log(document.querySelector('.signs img.img_dragging'));
                        //signature = $('.signs img.img_dragging').attr('src');
                        //added to store base64 datauri
                        domtoimage.toPng(document.getElementsByClassName('img_dragging')[0]).then( (dataUrl) => {
                            signature = dataUrl;
                            $(`<img src="` + signature + `"  class="temporary-signature draggable" page="` + this.pageNum + `" style="left: ` + leftPosition + `px; top: ` + topPosition + `px;" data-left="` + parseInt(leftPosition - map.left + 29)+ `" data-top="` + parseInt(topPosition - map.top + 18) + `">`).appendTo(".temporary-signatures-holder").draggable({
                                drag: function() {
                                    var map = $(".document-map").offset();
                                    var offset = $(this).offset();
                                    var xPos = parseInt(offset.left - map.left + 29);
                                    var yPos = parseInt(offset.top - map.top + 18);
                                    $(this).attr("data-top", yPos);
                                    $(this).attr("data-left", xPos);
                                }
                            });
                        })
                        .catch(function (error) {
                            console.error('oops, something went wrong!', error);
                        });
                        //console.log(signature);
                    }
                    //commented to store base64 datauri
                    /*$(`<img src="` + signature + `"  class="temporary-signature draggable" page="` + this.pageNum + `" style="left: ` + leftPosition + `px; top: ` + topPosition + `px;" data-left="` + parseInt(leftPosition - map.left + 29)+ `" data-top="` + parseInt(topPosition - map.top + 18) + `">`).appendTo(".temporary-signatures-holder").draggable({
                        drag: function() {
                            var map = $(".document-map").offset();
                            var offset = $(this).offset();
                            var xPos = parseInt(offset.left - map.left + 29);
                            var yPos = parseInt(offset.top - map.top + 18);
                            $(this).attr("data-top", yPos);
                            $(this).attr("data-left", xPos);
                        }
                    });*/
                }else if($("body").hasClass("write")){
                    map = $(".document-map").offset();
                    leftPosition = parseInt(e.pageX + 8);
                    topPosition = parseInt(e.pageY - 4);
                    if ($("body").hasClass("request")) {
                        signature = "assets/images/mark.png";
                    }else{
                        //signature = "uploads/signatures/" + $(".data-holder").attr("signature");
                        signature = $('.signs img.img_dragging').attr('src');
                    }

                    $(`<div class="writing-pad draggable" contenteditable="true"  spellcheck="false"  page="` + this.pageNum + `" style="left: ` + leftPosition + `px; top: ` + topPosition + `px;" data-left="` + parseInt(leftPosition - map.left + 29)+ `" data-top="` + parseInt(topPosition - map.top + 17) + `"></div>`).appendTo(".temporary-text-holder").draggable({
                        drag: function() {
                            var map = $(".document-map").offset();
                            var offset = $(this).offset();
                            var xPos = parseInt(offset.left - map.left + 29);
                            var yPos = parseInt(offset.top - map.top + 18);
                            $(this).attr("data-top", yPos);
                            $(this).attr("data-left", xPos);
                        }
                    });
                    $('.temporary-text-holder').children().last().focus();

                }


                return false;
            },
    },
    }
</script>

<style scoped>

</style>