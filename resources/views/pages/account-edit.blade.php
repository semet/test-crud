<x-layouts.main>
    <x-slot:title>
        Edit Account
    </x-slot:title>
    <div class="overflow-x-auto">
        <h1 class="text-center my-2 text-3xl font-semibold text-gray-600">Edit Account</h1>
        <div class="min-w-screen bg-gray-100 flex items-center justify-center overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white w-1/2 mx-auto shadow-md rounded my-6 px-4 py-6">
                    <form action="{{ route('account.update', $account) }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <input type="text" value="{{ $account->username }}" name="username" id="username" placeholder="Username" class="form-input px-4 py-3 rounded-lg w-full border-indigo-400 ring-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 @error('username') border-pink-700 ring-pink-700 @enderror">
                        </div>
                        <div class="mb-6">
                            <input type="text" value="{{ $account->name }}" name="name" id="name" placeholder="Name" class="form-input px-4 py-3 rounded-lg w-full border-indigo-400 ring-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-pink-700 ring-pink-700 @enderror">
                        </div>
                        <div class="mb-6">
                            <input type="password" name="password" id="password" placeholder="password" class="form-input px-4 py-3 rounded-lg w-full border-indigo-400 ring-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-pink-700 ring-pink-700 @enderror">
                        </div>
                        <div class="mb-6">
                            <select name="role" id="role" class="form-input px-4 py-3 rounded-lg w-full border-indigo-400 ring-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 @error('role') border-pink-700 ring-pink-700 @enderror">
                                <option value="" selected>--pilih role--</option>
                                <option value="admin" @selected($account->role == 'admin' )>Admin</option>
                                <option value="author" @selected($account->role == 'author' )>Author</option>
                            </select>
                        </div>
                        <div class="mb-6 flex justify-center">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 p-2 text-gray-300 hover:text-gray-200 rounded-lg">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
