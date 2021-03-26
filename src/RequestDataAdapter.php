<?php

namespace RequestAdapter;


/**
 * trait RequestAdapter
 */
trait RequestDataAdapter
{

    /**
     * Get formatted input dataset
     *
     * @return array
     */
    public function formattedData(): array
    {
        return $this->getMappingData($this->request->all());
    }

    /**
     * Convert data by mappingData
     *
     * @param $data
     * @param array $parrentMap
     *
     * @return array
     */
    public function getMappingData($data, array $parrentMap = []): array
    {
        $mappingData = $parrentMap ? : $this->mappingData();
        $result = [];
        foreach ($data as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $result[$key] = $this->getMappingData($value, $mappingData[$key]);
                continue;
            }
            if (isset($mappingData[$key])) {
                $result[$mappingData[$key]] = $value;
            }
        }
        return $result;
    }

    /**
     * Sourcemap data conversion
     *
     * @return array
     */
    abstract public function mappingData(): array;
}
