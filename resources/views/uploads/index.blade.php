<div class="container">
    <div class="content">
        <ol type="1" class="file-list">
            @foreach ($uploads as $upload)
                <li value="{{ $upload->id }}" class="file-item">
                    <!-- 文件下载链接 -->
                    <a href="{{ url("/uploads/{$upload->id}/{$upload->originalName}") }}" class="file-link">
                        {{ $upload->originalName }}
                    </a>

                    <!-- 编辑表单 -->
                    <form method="GET" 
                          action="{{ url("/uploads/{$upload->id}/edit") }}" 
                          class="inline-form">
                        @csrf
                        <button type="submit" class="btn edit-btn">
                            Edit
                        </button>
                    </form>

                    <!-- 删除表单 -->
                    <form method="POST" 
                          action="{{ url("/uploads/{$upload->id}") }}" 
                          class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn delete-btn" 
                                onclick="return confirm('Are you sure you want to delete this file?')">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ol>

        @if (session('operation'))
            <div class="notification">
                {{ session('operation') }} {{ session('id') }}
            </div>
        @endif

        <a href="{{ url('/uploads/create') }}" class="btn add-file-btn">Add file</a>
    </div>
</div>

<!-- 样式部分 -->
<style>
    /* 页面布局：居中 */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height:65vh;
        background-color:rgb(192, 192, 192);
        font-family: Arial, sans-serif;
        color: rgb(102, 205, 170);
    }

    .container {
        width: 100%;
        max-width: 600px;
        text-align: center;
    }

    .content {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);

    }

    /* 文件列表样式 */
    .file-list {
        padding: 0;
        list-style: none;
        margin: 20px 0;
    }

    .file-item {
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .file-link {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .file-link:hover {
        text-decoration: underline;
    }

    /* 按钮样式 */
    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #ffc107;
        color: white;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .delete-btn {
        background-color: #000080;
        color: white;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .add-file-btn {
        margin-top: 20px;
        padding: 10px 16px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 4px;
    }

    .add-file-btn:hover {
        background-color: #006400;
    }

    /* 提示信息样式 */
    .notification {
        margin-top: 20px;
        padding: 10px;
        background-color: #FF8C00;
        border: 1px solid #d4edda;
        color: #556B2F;
        border-radius: 4px;
        font-size: 14px;
    }
</style>
