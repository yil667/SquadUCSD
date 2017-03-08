/**
 * Created by Wenyi on 3/7/2017.
 */
$('#pagination-demo').twbsPagination({
    totalPages: 35,
    visiblePages: 7,
    onPageClick: function (event, page) {
        $('#page-content').text('Page ' + page);
    }
});