<div class="container">
    <!-- Header --> 
    <div class="header p-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-11">
                    <h1>Contacts</h1>
                </div>
                <div class="col-1">
                    <i class="bi bi-plus-circle text-primary" style="font-size:30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addContactModal"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Table -->
    <div class="container">
        <table class="table table-hover">
            <tbody id="contacts_results">
                <!-- Contacts will be loaded here -->
            </tbody>
        </table>
    </div>
</div>
