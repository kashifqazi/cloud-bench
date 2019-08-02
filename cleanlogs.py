infile = open ("logs")
data = infile.readlines()
infile.close()

outfile = open("cleanlogs", 'w')
headers = 0
skipper = 0
av = 0
twos = False
for val in data:
	if headers < 6:
		headers += 1
		continue
	if skipper < 5 and skipper > 0:
		skipper += 1
		if skipper == 5:
			skipper = 0
		continue
	skipper += 1
	v = val.rstrip('\n').split()
	if not twos:
		av = float(v[2])
		twos = True
	else:
		av += float(v[2])
		av /= 2
		outfile.write(str(av)+'\n')
		av = 0
		twos = False

outfile.close()

