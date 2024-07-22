  function confirmDelete(userId) {
    if (confirm("Are you sure you want to delete this member?")) {
      deleteMember(userId);
    }
  }
  async function deleteMember(userId) {
    try {
      const response = await fetch(`/manage_library/backend/member/delete_member.php?id=${userId}`, {
        method: 'DELETE'
      });

      if (response.ok) {
        // Reload the member list or remove the deleted row from the table
        loadContent('member/member');
      } else {
        alert('Error deleting member');
      }
    } catch (error) {
      alert('Error deleting member');
    }
  }