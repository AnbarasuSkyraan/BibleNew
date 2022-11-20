<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Versions Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('admin/AddVersions')}}">
          <i class="bi bi-circle"></i><span>Add New Version</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/ManageVersion/1')}}">
          <i class="bi bi-circle"></i><span>Manage version</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#bookspanel" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Books Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="bookspanel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('admin/AddBooks')}}">
          <i class="bi bi-circle"></i><span>Add New Book</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/ManageBooks/1')}}">
          <i class="bi bi-circle"></i><span>Manage Books</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#chapterspanel" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Chapter Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="chapterspanel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('admin/AddChapter')}}">
          <i class="bi bi-circle"></i><span>Add New Chapter</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/ManageChapters/1')}}">
          <i class="bi bi-circle"></i><span>Manage Chapters</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#recordspanel" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Records Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="recordspanel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('admin/AddRecords')}}">
          <i class="bi bi-circle"></i><span>Add New Record</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/ManageRecords/1')}}">
          <i class="bi bi-circle"></i><span>Manage Records</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#bulkupload" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Bulk Upload</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="bulkupload" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('admin/BookUpload')}}">
          <i class="bi bi-circle"></i><span>Book Upload</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/VersUpload')}}">
          <i class="bi bi-circle"></i><span>Verse Upload</span>
        </a>
      </li>
      <li>
        <a href="{{url('admin/UploadHistory')}}">
          <i class="bi bi-circle"></i><span>Upload History</span>
        </a>
      </li>
     
     
    </ul>
  </li><!-- End Forms Nav -->

  

</ul>

</aside><!-- End Sidebar-->