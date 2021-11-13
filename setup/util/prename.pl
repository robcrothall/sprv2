#!/usr/bin/perl -w
use strict;
my $dirname = "Policies";
my $file = "";
my $newname = "";
my $kount = 0;
opendir(DIR, $dirname) or die "Can't open $dirname: $!";
while (defined($file = readdir(DIR))) {
#    print "DirName=$dirname, File=$file!\n";
    $newname = $file;
    $kount = $newname =~ tr/ /_/;
    if ($kount > 0) {
	print "$kount $newname\n";
	rename("$dirname/$file", "$dirname/$newname") or warn "Could not rename $file to $newname: $!\n";
    }
}
print "End of directory";
