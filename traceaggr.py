import sys

def maxminavgdev(filename):
	ofc = open("aggr", 'w')
	infile = open("/home/ubuntu/cloud-bench/traces/"+str(filename), 'r')
	cpu = []
	mem = []
	data = infile.readlines()
	infile.close()
	for dat in data:
		cpu.append(float(dat.rstrip('\n').split(',')[1]))
		mem.append(float(dat.rstrip('\n').split(',')[2]))
	npc = np.array(cpu)
	npm = np.array(mem)

	ofc.write(str(np.max(npc)) + ',' + str(np.max(npm)) + '\n' + str(np.min(npc)) + ',' + str(np.min(npm)) + '\n' + str(np.mean(npc)) + ',' str(np.mean(npm)) + '\n' + str(np.median(npc)) + ',' + str(np.median(npm)) + '\n' + str(np.std(npc)) + ',' + str(np.std(npm)) + '\n')
	ofc.close()

def decomposecpu(filename):
	infile = open("/home/ubuntu/cloud-bench/traces/"+str(filename), 'r')
	#infile = open("/home/kashif/Documents/Research/Benchmarking/GoogleTraces/GHosts/GHost100", 'r')
	cpu = []
	#mem = []
	data = infile.readlines()
	infile.close()
	for dat in data:
		cpu.append(float(dat.rstrip('\n').split(',')[1]))
		#mem.append(float(dat.rstrip('\n').split(',')[2]))
 
	cpu = np.array(cpu)
	#mem = np.array(mem)
	result = seasonal_decompose(cpu, model='additive', freq=288)
	#result2 = seasonal_decompose(mem, model='additive', freq=288)
	
	result.plot()
	#result2.plot()
	
	plt.savefig('decompcpu.png', format='png', dpi=1000)
	
def decomposemem(filename):
	infile = open("/home/ubuntu/cloud-bench/traces/"+str(filename), 'r')
	#infile = open("/home/kashif/Documents/Research/Benchmarking/GoogleTraces/GHosts/GHost100", 'r')
	#cpu = []
	mem = []
	data = infile.readlines()
	infile.close()
	for dat in data:
		#cpu.append(float(dat.rstrip('\n').split(',')[1]))
		mem.append(float(dat.rstrip('\n').split(',')[2]))
 
	#cpu = np.array(cpu)
	mem = np.array(mem)
	#result = seasonal_decompose(cpu, model='additive', freq=288)
	result2 = seasonal_decompose(mem, model='additive', freq=288)
	
	#result.plot()
	result2.plot()
	
	plt.savefig('decompmem.png', format='png', dpi=1000)


def autocorrcpu(filename):
	infile = open("/home/ubuntu/cloud-bench/traces/"+str(filename), 'r')
	#infile = open("/home/kashif/Documents/Research/Benchmarking/GoogleTraces/GHosts/GHost"+str(filename), 'r')
	cpu = []
	#mem = []
	data = infile.readlines()
	infile.close()
	for dat in data:
		cpu.append(float(dat.rstrip('\n').split(',')[1]))
		#mem.append(float(dat.rstrip('\n').split(',')[2]))
 
	cpu = np.array(cpu)
	#mem = np.array(mem)
	
	cor = []
	for i in range(1, 800):
		rs = np.corrcoef(cpu[:-i], cpu[i:])
		cor.append(rs[0][1])
	
	#cor=[]
	#for i in range(1, 800):
	#	rs = np.corrcoef(mem[:-i], mem[i:])
	#	cor.append(rs[0][1])
	
	#ax.axvline(np.ceil(len(rs)/2),color='k',linestyle='--',label='Center')
	#ax.axvline(np.argmax(rs),color='r',linestyle='--',label='Peak synchrony')
	#ax.set(title=f'Offset = {offset} frames\nS1 leads <> S2 leads',ylim=[.1,.31],xlim=[0,300], xlabel='Offset',ylabel='Pearson r')
	#ax.set_xticklabels([int(item-150) for item in ax.get_xticks()])
	#plt.legend()
	
	fig, ax = plt.subplots()
	ax.grid(True)

	ticklines = ax.get_xticklines() + ax.get_yticklines()
	gridlines = ax.get_xgridlines() + ax.get_ygridlines()
	ticklabels = ax.get_xticklabels() + ax.get_yticklabels()

	plt.plot(range(1,800), cor)
	#ax.set_xlim(xmin=0, xmax=1.0)
	ax.set_ylim(ymin=-0.5, ymax=1)

	plt.ylabel('Pearson r')
	plt.xlabel('Lag')
	plt.tight_layout()
	plt.savefig('autocorcpu.png', format='png', dpi=1000)
	
def autocorrmem(filename):
	infile = open("/home/ubuntu/cloud-bench/traces/"+str(filename), 'r')
	#infile = open("/home/kashif/Documents/Research/Benchmarking/GoogleTraces/GHosts/GHost"+str(filename), 'r')
	#cpu = []
	mem = []
	data = infile.readlines()
	infile.close()
	for dat in data:
	#	cpu.append(float(dat.rstrip('\n').split(',')[1]))
		mem.append(float(dat.rstrip('\n').split(',')[2]))
 
	#cpu = np.array(cpu)
	mem = np.array(mem)
	
	#cor = []
	#for i in range(1, 800):
	#	rs = np.corrcoef(cpu[:-i], cpu[i:])
	#	cor.append(rs[0][1])
	
	cor=[]
	for i in range(1, 800):
		rs = np.corrcoef(mem[:-i], mem[i:])
		cor.append(rs[0][1])
	
	#ax.axvline(np.ceil(len(rs)/2),color='k',linestyle='--',label='Center')
	#ax.axvline(np.argmax(rs),color='r',linestyle='--',label='Peak synchrony')
	#ax.set(title=f'Offset = {offset} frames\nS1 leads <> S2 leads',ylim=[.1,.31],xlim=[0,300], xlabel='Offset',ylabel='Pearson r')
	#ax.set_xticklabels([int(item-150) for item in ax.get_xticks()])
	#plt.legend()
	
	fig, ax = plt.subplots()
	ax.grid(True)

	ticklines = ax.get_xticklines() + ax.get_yticklines()
	gridlines = ax.get_xgridlines() + ax.get_ygridlines()
	ticklabels = ax.get_xticklabels() + ax.get_yticklabels()

	plt.plot(range(1,800), cor)
	#ax.set_xlim(xmin=0, xmax=1.0)
	ax.set_ylim(ymin=-0.5, ymax=1)

	plt.ylabel('Pearson r')
	plt.xlabel('Lag')
	plt.tight_layout()
	plt.savefig('autocormem.png', format='png', dpi=1000)

filename = sys.argv[1]
maxminavgdev(filename)
decomposecpu(filename)
decomposemem(filename)
autocorrcpu(filename)
autocorrmem(filename)
