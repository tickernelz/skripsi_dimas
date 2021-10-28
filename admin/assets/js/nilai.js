var dp1_total1;
var dp1_total2;
var dp1_total3;
var dp1_total4;
var dp1_total_nilai;
var dp1_keterangan;
var dpen1_total1;
var dpen1_total2;
var dpen1_total3;
var dpen1_total4;
var dpen1_total_nilai;
var dpen1_keterangan;
var dpen2_total1;
var dpen2_total2;
var dpen2_total3;
var dpen2_total4;
var dpen2_total_nilai;
var dpen2_keterangan;
var dpen3_total1;
var dpen3_total2;
var dpen3_total3;
var dpen3_total4;
var dpen3_total_nilai;
var dpen3_keterangan;

$('#dp1_input_nilai1').bind('keyup mouseup',function (ev1) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dp1_total1 = $('#dp1_input_nilai1').val() * 0.3;
        $('#dp1_hasil_nilai1').val(dp1_total1);
        dp1_total_nilai = $('#dp1_input_nilai1').val() * 0.3 + $('#dp1_input_nilai2').val() * 0.2 + $('#dp1_input_nilai3').val() * 0.25 + $('#dp1_input_nilai4').val() * 0.25;
        $('#dp1_hasil_total').val(dp1_total_nilai);
        if (dp1_total_nilai >= 1 && dp1_total_nilai < 1.5) {
            dp1_keterangan = 'Kurang Baik';
        } else if (dp1_total_nilai >= 1.5 && dp1_total_nilai < 2.5) {
            dp1_keterangan = 'Kurang';
        } else if (dp1_total_nilai >= 2.5 && dp1_total_nilai < 3.5) {
            dp1_keterangan = 'Cukup';
        } else if (dp1_total_nilai >= 3.5 && dp1_total_nilai < 4.5) {
            dp1_keterangan = 'Baik';
        } else if (dp1_total_nilai >= 4.5 && dp1_total_nilai <= 5) {
            dp1_keterangan = 'Sangat Baik';
        }
        $('#dp1_ket_nilai').val(dp1_keterangan);
    }
});
$('#dp1_input_nilai2').bind('keyup mouseup',function (ev2) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dp1_total2 = $('#dp1_input_nilai2').val() * 0.2;
        $('#dp1_hasil_nilai2').val(dp1_total2);
        dp1_total_nilai = $('#dp1_input_nilai1').val() * 0.3 + $('#dp1_input_nilai2').val() * 0.2 + $('#dp1_input_nilai3').val() * 0.25 + $('#dp1_input_nilai4').val() * 0.25;
        $('#dp1_hasil_total').val(dp1_total_nilai);
        if (dp1_total_nilai >= 1 && dp1_total_nilai < 1.5) {
            dp1_keterangan = 'Kurang Baik';
        } else if (dp1_total_nilai >= 1.5 && dp1_total_nilai < 2.5) {
            dp1_keterangan = 'Kurang';
        } else if (dp1_total_nilai >= 2.5 && dp1_total_nilai < 3.5) {
            dp1_keterangan = 'Cukup';
        } else if (dp1_total_nilai >= 3.5 && dp1_total_nilai < 4.5) {
            dp1_keterangan = 'Baik';
        } else if (dp1_total_nilai >= 4.5 && dp1_total_nilai <= 5) {
            dp1_keterangan = 'Sangat Baik';
        }
        $('#dp1_ket_nilai').val(dp1_keterangan);
    }
});
$('#dp1_input_nilai3').bind('keyup mouseup',function (ev3) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dp1_total3 = $('#dp1_input_nilai3').val() * 0.25;
        $('#dp1_hasil_nilai3').val(dp1_total3);
        dp1_total_nilai = $('#dp1_input_nilai1').val() * 0.3 + $('#dp1_input_nilai2').val() * 0.2 + $('#dp1_input_nilai3').val() * 0.25 + $('#dp1_input_nilai4').val() * 0.25;
        $('#dp1_hasil_total').val(dp1_total_nilai);
        if (dp1_total_nilai >= 1 && dp1_total_nilai < 1.5) {
            dp1_keterangan = 'Kurang Baik';
        } else if (dp1_total_nilai >= 1.5 && dp1_total_nilai < 2.5) {
            dp1_keterangan = 'Kurang';
        } else if (dp1_total_nilai >= 2.5 && dp1_total_nilai < 3.5) {
            dp1_keterangan = 'Cukup';
        } else if (dp1_total_nilai >= 3.5 && dp1_total_nilai < 4.5) {
            dp1_keterangan = 'Baik';
        } else if (dp1_total_nilai >= 4.5 && dp1_total_nilai <= 5) {
            dp1_keterangan = 'Sangat Baik';
        }
        $('#dp1_ket_nilai').val(dp1_keterangan);
    }
});
$('#dp1_input_nilai4').bind('keyup mouseup',function (ev4) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dp1_total4 = $('#dp1_input_nilai4').val() * 0.25;
        $('#dp1_hasil_nilai4').val(dp1_total4);
        dp1_total_nilai = $('#dp1_input_nilai1').val() * 0.3 + $('#dp1_input_nilai2').val() * 0.2 + $('#dp1_input_nilai3').val() * 0.25 + $('#dp1_input_nilai4').val() * 0.25;
        $('#dp1_hasil_total').val(dp1_total_nilai);
        if (dp1_total_nilai >= 1 && dp1_total_nilai < 1.5) {
            dp1_keterangan = 'Kurang Baik';
        } else if (dp1_total_nilai >= 1.5 && dp1_total_nilai < 2.5) {
            dp1_keterangan = 'Kurang';
        } else if (dp1_total_nilai >= 2.5 && dp1_total_nilai < 3.5) {
            dp1_keterangan = 'Cukup';
        } else if (dp1_total_nilai >= 3.5 && dp1_total_nilai < 4.5) {
            dp1_keterangan = 'Baik';
        } else if (dp1_total_nilai >= 4.5 && dp1_total_nilai <= 5) {
            dp1_keterangan = 'Sangat Baik';
        }
        $('#dp1_ket_nilai').val(dp1_keterangan);
    }
});

$('#dpen1_input_nilai1').bind('keyup mouseup',function (ev1) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen1_total1 = $('#dpen1_input_nilai1').val() * 0.3;
        $('#dpen1_hasil_nilai1').val(dpen1_total1);
        dpen1_total_nilai = $('#dpen1_input_nilai1').val() * 0.3 + $('#dpen1_input_nilai2').val() * 0.2 + $('#dpen1_input_nilai3').val() * 0.25 + $('#dpen1_input_nilai4').val() * 0.25;
        $('#dpen1_hasil_total').val(dpen1_total_nilai);
        if (dpen1_total_nilai >= 1 && dpen1_total_nilai < 1.5) {
            dpen1_keterangan = 'Kurang Baik';
        } else if (dpen1_total_nilai >= 1.5 && dpen1_total_nilai < 2.5) {
            dpen1_keterangan = 'Kurang';
        } else if (dpen1_total_nilai >= 2.5 && dpen1_total_nilai < 3.5) {
            dpen1_keterangan = 'Cukup';
        } else if (dpen1_total_nilai >= 3.5 && dpen1_total_nilai < 4.5) {
            dpen1_keterangan = 'Baik';
        } else if (dpen1_total_nilai >= 4.5 && dpen1_total_nilai <= 5) {
            dpen1_keterangan = 'Sangat Baik';
        }
        $('#dpen1_ket_nilai').val(dpen1_keterangan);
    }
});
$('#dpen1_input_nilai2').bind('keyup mouseup',function (ev2) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen1_total2 = $('#dpen1_input_nilai2').val() * 0.2;
        $('#dpen1_hasil_nilai2').val(dpen1_total2);
        dpen1_total_nilai = $('#dpen1_input_nilai1').val() * 0.3 + $('#dpen1_input_nilai2').val() * 0.2 + $('#dpen1_input_nilai3').val() * 0.25 + $('#dpen1_input_nilai4').val() * 0.25;
        $('#dpen1_hasil_total').val(dpen1_total_nilai);
        if (dpen1_total_nilai >= 1 && dpen1_total_nilai < 1.5) {
            dpen1_keterangan = 'Kurang Baik';
        } else if (dpen1_total_nilai >= 1.5 && dpen1_total_nilai < 2.5) {
            dpen1_keterangan = 'Kurang';
        } else if (dpen1_total_nilai >= 2.5 && dpen1_total_nilai < 3.5) {
            dpen1_keterangan = 'Cukup';
        } else if (dpen1_total_nilai >= 3.5 && dpen1_total_nilai < 4.5) {
            dpen1_keterangan = 'Baik';
        } else if (dpen1_total_nilai >= 4.5 && dpen1_total_nilai <= 5) {
            dpen1_keterangan = 'Sangat Baik';
        }
        $('#dpen1_ket_nilai').val(dpen1_keterangan);
    }
});
$('#dpen1_input_nilai3').bind('keyup mouseup',function (ev3) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen1_total3 = $('#dpen1_input_nilai3').val() * 0.25;
        $('#dpen1_hasil_nilai3').val(dpen1_total3);
        dpen1_total_nilai = $('#dpen1_input_nilai1').val() * 0.3 + $('#dpen1_input_nilai2').val() * 0.2 + $('#dpen1_input_nilai3').val() * 0.25 + $('#dpen1_input_nilai4').val() * 0.25;
        $('#dpen1_hasil_total').val(dpen1_total_nilai);
        if (dpen1_total_nilai >= 1 && dpen1_total_nilai < 1.5) {
            dpen1_keterangan = 'Kurang Baik';
        } else if (dpen1_total_nilai >= 1.5 && dpen1_total_nilai < 2.5) {
            dpen1_keterangan = 'Kurang';
        } else if (dpen1_total_nilai >= 2.5 && dpen1_total_nilai < 3.5) {
            dpen1_keterangan = 'Cukup';
        } else if (dpen1_total_nilai >= 3.5 && dpen1_total_nilai < 4.5) {
            dpen1_keterangan = 'Baik';
        } else if (dpen1_total_nilai >= 4.5 && dpen1_total_nilai <= 5) {
            dpen1_keterangan = 'Sangat Baik';
        }
        $('#dpen1_ket_nilai').val(dpen1_keterangan);
    }
});
$('#dpen1_input_nilai4').bind('keyup mouseup',function (ev4) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen1_total4 = $('#dpen1_input_nilai4').val() * 0.25;
        $('#dpen1_hasil_nilai4').val(dpen1_total4);
        dpen1_total_nilai = $('#dpen1_input_nilai1').val() * 0.3 + $('#dpen1_input_nilai2').val() * 0.2 + $('#dpen1_input_nilai3').val() * 0.25 + $('#dpen1_input_nilai4').val() * 0.25;
        $('#dpen1_hasil_total').val(dpen1_total_nilai);
        if (dpen1_total_nilai >= 1 && dpen1_total_nilai < 1.5) {
            dpen1_keterangan = 'Kurang Baik';
        } else if (dpen1_total_nilai >= 1.5 && dpen1_total_nilai < 2.5) {
            dpen1_keterangan = 'Kurang';
        } else if (dpen1_total_nilai >= 2.5 && dpen1_total_nilai < 3.5) {
            dpen1_keterangan = 'Cukup';
        } else if (dpen1_total_nilai >= 3.5 && dpen1_total_nilai < 4.5) {
            dpen1_keterangan = 'Baik';
        } else if (dpen1_total_nilai >= 4.5 && dpen1_total_nilai <= 5) {
            dpen1_keterangan = 'Sangat Baik';
        }
        $('#dpen1_ket_nilai').val(dpen1_keterangan);
    }
});

$('#dpen2_input_nilai1').bind('keyup mouseup',function (ev1) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen2_total1 = $('#dpen2_input_nilai1').val() * 0.3;
        $('#dpen2_hasil_nilai1').val(dpen2_total1);
        dpen2_total_nilai = $('#dpen2_input_nilai1').val() * 0.3 + $('#dpen2_input_nilai2').val() * 0.2 + $('#dpen2_input_nilai3').val() * 0.25 + $('#dpen2_input_nilai4').val() * 0.25;
        $('#dpen2_hasil_total').val(dpen2_total_nilai);
        if (dpen2_total_nilai >= 1 && dpen2_total_nilai < 1.5) {
            dpen2_keterangan = 'Kurang Baik';
        } else if (dpen2_total_nilai >= 1.5 && dpen2_total_nilai < 2.5) {
            dpen2_keterangan = 'Kurang';
        } else if (dpen2_total_nilai >= 2.5 && dpen2_total_nilai < 3.5) {
            dpen2_keterangan = 'Cukup';
        } else if (dpen2_total_nilai >= 3.5 && dpen2_total_nilai < 4.5) {
            dpen2_keterangan = 'Baik';
        } else if (dpen2_total_nilai >= 4.5 && dpen2_total_nilai <= 5) {
            dpen2_keterangan = 'Sangat Baik';
        }
        $('#dpen2_ket_nilai').val(dpen2_keterangan);
    }
});
$('#dpen2_input_nilai2').bind('keyup mouseup',function (ev2) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen2_total2 = $('#dpen2_input_nilai2').val() * 0.2;
        $('#dpen2_hasil_nilai2').val(dpen2_total2);
        dpen2_total_nilai = $('#dpen2_input_nilai1').val() * 0.3 + $('#dpen2_input_nilai2').val() * 0.2 + $('#dpen2_input_nilai3').val() * 0.25 + $('#dpen2_input_nilai4').val() * 0.25;
        $('#dpen2_hasil_total').val(dpen2_total_nilai);
        if (dpen2_total_nilai >= 1 && dpen2_total_nilai < 1.5) {
            dpen2_keterangan = 'Kurang Baik';
        } else if (dpen2_total_nilai >= 1.5 && dpen2_total_nilai < 2.5) {
            dpen2_keterangan = 'Kurang';
        } else if (dpen2_total_nilai >= 2.5 && dpen2_total_nilai < 3.5) {
            dpen2_keterangan = 'Cukup';
        } else if (dpen2_total_nilai >= 3.5 && dpen2_total_nilai < 4.5) {
            dpen2_keterangan = 'Baik';
        } else if (dpen2_total_nilai >= 4.5 && dpen2_total_nilai <= 5) {
            dpen2_keterangan = 'Sangat Baik';
        }
        $('#dpen2_ket_nilai').val(dpen2_keterangan);
    }
});
$('#dpen2_input_nilai3').bind('keyup mouseup',function (ev3) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen2_total3 = $('#dpen2_input_nilai3').val() * 0.25;
        $('#dpen2_hasil_nilai3').val(dpen2_total3);
        dpen2_total_nilai = $('#dpen2_input_nilai1').val() * 0.3 + $('#dpen2_input_nilai2').val() * 0.2 + $('#dpen2_input_nilai3').val() * 0.25 + $('#dpen2_input_nilai4').val() * 0.25;
        $('#dpen2_hasil_total').val(dpen2_total_nilai);
        if (dpen2_total_nilai >= 1 && dpen2_total_nilai < 1.5) {
            dpen2_keterangan = 'Kurang Baik';
        } else if (dpen2_total_nilai >= 1.5 && dpen2_total_nilai < 2.5) {
            dpen2_keterangan = 'Kurang';
        } else if (dpen2_total_nilai >= 2.5 && dpen2_total_nilai < 3.5) {
            dpen2_keterangan = 'Cukup';
        } else if (dpen2_total_nilai >= 3.5 && dpen2_total_nilai < 4.5) {
            dpen2_keterangan = 'Baik';
        } else if (dpen2_total_nilai >= 4.5 && dpen2_total_nilai <= 5) {
            dpen2_keterangan = 'Sangat Baik';
        }
        $('#dpen2_ket_nilai').val(dpen2_keterangan);
    }
});
$('#dpen2_input_nilai4').bind('keyup mouseup',function (ev4) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen2_total4 = $('#dpen2_input_nilai4').val() * 0.25;
        $('#dpen2_hasil_nilai4').val(dpen2_total4);
        dpen2_total_nilai = $('#dpen2_input_nilai1').val() * 0.3 + $('#dpen2_input_nilai2').val() * 0.2 + $('#dpen2_input_nilai3').val() * 0.25 + $('#dpen2_input_nilai4').val() * 0.25;
        $('#dpen2_hasil_total').val(dpen2_total_nilai);
        if (dpen2_total_nilai >= 1 && dpen2_total_nilai < 1.5) {
            dpen2_keterangan = 'Kurang Baik';
        } else if (dpen2_total_nilai >= 1.5 && dpen2_total_nilai < 2.5) {
            dpen2_keterangan = 'Kurang';
        } else if (dpen2_total_nilai >= 2.5 && dpen2_total_nilai < 3.5) {
            dpen2_keterangan = 'Cukup';
        } else if (dpen2_total_nilai >= 3.5 && dpen2_total_nilai < 4.5) {
            dpen2_keterangan = 'Baik';
        } else if (dpen2_total_nilai >= 4.5 && dpen2_total_nilai <= 5) {
            dpen2_keterangan = 'Sangat Baik';
        }
        $('#dpen2_ket_nilai').val(dpen2_keterangan);
    }
});

$('#dpen3_input_nilai1').bind('keyup mouseup',function (ev1) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen3_total1 = $('#dpen3_input_nilai1').val() * 0.3;
        $('#dpen3_hasil_nilai1').val(dpen3_total1);
        dpen3_total_nilai = $('#dpen3_input_nilai1').val() * 0.3 + $('#dpen3_input_nilai2').val() * 0.2 + $('#dpen3_input_nilai3').val() * 0.25 + $('#dpen3_input_nilai4').val() * 0.25;
        $('#dpen3_hasil_total').val(dpen3_total_nilai);
        if (dpen3_total_nilai >= 1 && dpen3_total_nilai < 1.5) {
            dpen3_keterangan = 'Kurang Baik';
        } else if (dpen3_total_nilai >= 1.5 && dpen3_total_nilai < 2.5) {
            dpen3_keterangan = 'Kurang';
        } else if (dpen3_total_nilai >= 2.5 && dpen3_total_nilai < 3.5) {
            dpen3_keterangan = 'Cukup';
        } else if (dpen3_total_nilai >= 3.5 && dpen3_total_nilai < 4.5) {
            dpen3_keterangan = 'Baik';
        } else if (dpen3_total_nilai >= 4.5 && dpen3_total_nilai <= 5) {
            dpen3_keterangan = 'Sangat Baik';
        }
        $('#dpen3_ket_nilai').val(dpen3_keterangan);
    }
});
$('#dpen3_input_nilai2').bind('keyup mouseup',function (ev2) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen3_total2 = $('#dpen3_input_nilai2').val() * 0.2;
        $('#dpen3_hasil_nilai2').val(dpen3_total2);
        dpen3_total_nilai = $('#dpen3_input_nilai1').val() * 0.3 + $('#dpen3_input_nilai2').val() * 0.2 + $('#dpen3_input_nilai3').val() * 0.25 + $('#dpen3_input_nilai4').val() * 0.25;
        $('#dpen3_hasil_total').val(dpen3_total_nilai);
        if (dpen3_total_nilai >= 1 && dpen3_total_nilai < 1.5) {
            dpen3_keterangan = 'Kurang Baik';
        } else if (dpen3_total_nilai >= 1.5 && dpen3_total_nilai < 2.5) {
            dpen3_keterangan = 'Kurang';
        } else if (dpen3_total_nilai >= 2.5 && dpen3_total_nilai < 3.5) {
            dpen3_keterangan = 'Cukup';
        } else if (dpen3_total_nilai >= 3.5 && dpen3_total_nilai < 4.5) {
            dpen3_keterangan = 'Baik';
        } else if (dpen3_total_nilai >= 4.5 && dpen3_total_nilai <= 5) {
            dpen3_keterangan = 'Sangat Baik';
        }
        $('#dpen3_ket_nilai').val(dpen3_keterangan);
    }
});
$('#dpen3_input_nilai3').bind('keyup mouseup',function (ev3) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen3_total3 = $('#dpen3_input_nilai3').val() * 0.25;
        $('#dpen3_hasil_nilai3').val(dpen3_total3);
        dpen3_total_nilai = $('#dpen3_input_nilai1').val() * 0.3 + $('#dpen3_input_nilai2').val() * 0.2 + $('#dpen3_input_nilai3').val() * 0.25 + $('#dpen3_input_nilai4').val() * 0.25;
        $('#dpen3_hasil_total').val(dpen3_total_nilai);
        if (dpen3_total_nilai >= 1 && dpen3_total_nilai < 1.5) {
            dpen3_keterangan = 'Kurang Baik';
        } else if (dpen3_total_nilai >= 1.5 && dpen3_total_nilai < 2.5) {
            dpen3_keterangan = 'Kurang';
        } else if (dpen3_total_nilai >= 2.5 && dpen3_total_nilai < 3.5) {
            dpen3_keterangan = 'Cukup';
        } else if (dpen3_total_nilai >= 3.5 && dpen3_total_nilai < 4.5) {
            dpen3_keterangan = 'Baik';
        } else if (dpen3_total_nilai >= 4.5 && dpen3_total_nilai <= 5) {
            dpen3_keterangan = 'Sangat Baik';
        }
        $('#dpen3_ket_nilai').val(dpen3_keterangan);
    }
});
$('#dpen3_input_nilai4').bind('keyup mouseup',function (ev4) {
    if ($(this).val() > 5 || $(this).val() < 0) {
        alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
        $(this).val('0');
    } else {
        dpen3_total4 = $('#dpen3_input_nilai4').val() * 0.25;
        $('#dpen3_hasil_nilai4').val(dpen3_total4);
        dpen3_total_nilai = $('#dpen3_input_nilai1').val() * 0.3 + $('#dpen3_input_nilai2').val() * 0.2 + $('#dpen3_input_nilai3').val() * 0.25 + $('#dpen3_input_nilai4').val() * 0.25;
        $('#dpen3_hasil_total').val(dpen3_total_nilai);
        if (dpen3_total_nilai >= 1 && dpen3_total_nilai < 1.5) {
            dpen3_keterangan = 'Kurang Baik';
        } else if (dpen3_total_nilai >= 1.5 && dpen3_total_nilai < 2.5) {
            dpen3_keterangan = 'Kurang';
        } else if (dpen3_total_nilai >= 2.5 && dpen3_total_nilai < 3.5) {
            dpen3_keterangan = 'Cukup';
        } else if (dpen3_total_nilai >= 3.5 && dpen3_total_nilai < 4.5) {
            dpen3_keterangan = 'Baik';
        } else if (dpen3_total_nilai >= 4.5 && dpen3_total_nilai <= 5) {
            dpen3_keterangan = 'Sangat Baik';
        }
        $('#dpen3_ket_nilai').val(dpen3_keterangan);
    }
});