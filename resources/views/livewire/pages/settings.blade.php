<?php
use Livewire\Volt\Component;

new class extends Component {
}; ?>

<div class="min-h-screen p-8 bg-[#F8FAFC]">
  <div class="max-w-4xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Profile Settings</h2>

    <div x-data="{tab: 'profile'}" class="bg-white p-6 rounded-2xl shadow">
      <div class="flex gap-4 mb-4">
        <button @click.prevent="tab = 'profile'" :class="tab==='profile' ? 'bg-[#2159D4] text-white' : 'bg-gray-100'" class="px-4 py-2 rounded-2xl">Profile</button>
        <button @click.prevent="tab = 'security'" :class="tab==='security' ? 'bg-[#2159D4] text-white' : 'bg-gray-100'" class="px-4 py-2 rounded-2xl">Security</button>
      </div>

      <div x-show="tab === 'profile'">
        <form>
          <label class="block text-sm text-gray-600">Nama</label>
          <input class="w-full border rounded px-3 py-2 mb-3" />
          <button class="px-4 py-2 bg-[#2159D4] text-white rounded-2xl">Simpan</button>
        </form>
      </div>

      <div x-show="tab === 'security'" style="display:none;">
        <form>
          <label class="block text-sm text-gray-600">Password Baru</label>
          <input type="password" class="w-full border rounded px-3 py-2 mb-3" />
          <button class="px-4 py-2 bg-[#2159D4] text-white rounded-2xl">Ubah Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
